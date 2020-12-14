<?php

namespace app\controllers;

use app\models\mgcms\db\File;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use \app\models\mgcms\db\User;
use \app\components\mgcms\MgHelpers;
use \app\models\mgcms\db\Payment;
use app\components\GetResponse\GetResponse;
use app\components\GetResponse\jsonRPCClient;
use yii\web\UploadedFile;
use app\models\mgcms\db\Article;

class SiteController extends \app\components\mgcms\MgCmsController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $contactForm = new ContactForm();

        if ($contactForm->load(Yii::$app->request->post()) && $contactForm->contact(Yii::$app->params['adminEmail'])) {
            MgHelpers::setFlashSuccess(Yii::t('db', 'Mail has been sent'));
            return $this->refresh();
        }


        /* -----------  SEO  ------------ */
        Yii::$app->view->title = MgHelpers::getSettingTranslated('SEO_title_home_page_' . Yii::$app->language, Yii::$app->name);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => MgHelpers::getSettingTranslated('SEO_description_home_page_' . Yii::$app->language)
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => MgHelpers::getSettingTranslated('SEO_keywords_home_page_' . Yii::$app->language)
        ]);
        /* -----------  SEO  ------------ */


        return $this->render('index', [
            'contactForm' => $contactForm
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            MgHelpers::setFlashSuccess(MgHelpers::getSettingTranslated('register_after_message',
                'Thank you for registration, email with activation of account has been sent.'));
            return $this->refresh();
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionForgotPassword()
    {
        $model = new \app\models\ForgotPasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendMail()) {
            \app\components\mgcms\MgHelpers::setFlashSuccess(Yii::t('db', 'Forgot Password email has been sent'));
            return $this->goBack();
        }
        return $this->render('forgotPassword', [
            'model' => $model
        ]);
    }

    public function actionForgotPasswordChange($hash)
    {
        $email = \app\components\mgcms\MgHelpers::decrypt($hash);
        if (!$email) {
            $this->throw404();
        }
        $user = User::find()->where(['username' => $email])->one();
        if (!$user) {
            $this->throw404();
        }

        $model = new \app\models\ResetPasswordForm($user);
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            \app\components\mgcms\MgHelpers::setFlashSuccess(Yii::t('db', 'Password has been changed'));
            return $this->goBack();
        }
        return $this->render('resetPassword', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            MgHelpers::setFlashSuccess(Yii::t('db', 'Mail has been sent'));

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $model = new LoginForm();
        $modelRegister = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        if ($modelRegister->load(Yii::$app->request->post()) && $modelRegister->register()) {
            MgHelpers::setFlashSuccess(MgHelpers::getSettingTranslated('register_after_message', 'Thank you for registration, email with activation of account has been sent.'));
            return $this->refresh();
        }
        return $this->render('login', [
            'model' => $model,
            'modelRegister' => $modelRegister
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionKnowledgeBase()
    {
        return $this->render('knowledgeBase');
    }

    public function actionActivate($hash)
    {

        $id = MgHelpers::decrypt($hash);
        if (!$id) {
            $this->throw404();
        }

        $user = User::findOne($id);
        if (!$user) {
            $this->throw404();
        }

        $user->status = User::STATUS_ACTIVE;
        $saved = $user->save();
        if ($saved) {
            MgHelpers::setFlashSuccess(Yii::t('db', 'Successfull activation'));
            $this->redirect('/');
        }
    }

    public function actionMetrics($hash)
    {
        $id = MgHelpers::decrypt($hash);
        if (!$id) {
            $this->throw404();
        }

        $payment = Payment::findOne($id);

        if (!$payment || !$this->getUserModel()) {
            $this->throw404();
        }
        if ($payment->user_id !== $this->getUserModel()->id) {
            $this->throw404();
        }
        if (!in_array($payment->status, [Payment::STATUS_PAYMENT_CONFIRMED, Payment::STATUS_PAYMENT_CONFIRMED])) {
            $this->throw404();
        }


        return $this->renderPartial('certificate', [
                'model' => $payment
            ]
        );
    }

    public function actionAccount($backUrl = false)
    {


        $model = $this->getUserModel();
        $model->scenario = 'account';
        if ($backUrl) {
            $model->scenario = 'kyc';
        }


        if (Yii::$app->request->post('User')) {
            if (Yii::$app->request->post('passwordChanging')) {
                $model->scenario = 'passwordChanging';
            }
            $upladedFiles = UploadedFile::getInstance($model, 'file_id');
            if ($upladedFiles) {
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($upladedFiles));
                if ($file) {
                    $model->file_id = $file->id;
                }
            }
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if ($backUrl) {
                    $model->is_kyc_filled = 1;
                    $saved = $model->save();
                    if ($saved) {
                        return $this->redirect([$backUrl]);
                    }
                } else {
                    MgHelpers::setFlashSuccess(Yii::t('db', 'Saved succesfully'));
                }
            }
        }

        if (!$model) {
            $this->throw404();
        }
        return $this->render('account', [
            'model' => $model,
            'backProject' => $backUrl
        ]);
    }

    public function actionRemovePhoto()
    {
        $model = $this->getUserModel();
        $model->file_id = null;
        $model->save();
        $this->back();
    }

    public function actionSearch($q)
    {

        $query = Article::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_on' => SORT_DESC]]
        ]);


        $query->orWhere(['like', 'title', $q]);

        return $this->render('search', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionWouldYouLikeToInvest(){

        return $this->render('wouldYouLikeToInvest');
    }

    public function actionAboutUs(){

        return $this->render('aboutUs');
    }

    public function actionAboutOurPlatform(){

        return $this->render('aboutOurPlatform');
    }

    public function actionAboutProject(){

        return $this->render('aboutProject');
    }


}
