<?php

namespace app\controllers;

use Yii;
use yii\console\widgets\Table;
use yii\helpers\Json;
use yii\log\Logger;
use yii\web\Controller;
use app\models\mgcms\db\Project;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use \app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Payment;
use __;
use yii\web\Session;

class ProjectController extends \app\components\mgcms\MgCmsController
{

    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Project::find()->where(['status' => Project::STATUS_ACTIVE]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionView($name)
    {
        $model = Project::find()->where(['name' => $name])->one();
        if (!$model) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }

        return $this->render('view', ['model' => $model]);
    }

    public function actionBuy()
    {

        if (!MgHelpers::getUserModel()) {
            MgHelpers::setFlashError(Yii::t('db', 'You must to be logged in'));
            return $this->redirect(['site/login']);
        }

        $user = MgHelpers::getUserModel();
        if(!$user->first_name || !$user->last_name || !$user->street || !$user->flat_no || !$user->postcode || !$user->city){
            MgHelpers::setFlash(MgHelpers::FLASH_TYPE_WARNING, Yii::t('db', 'Fill your account data please first'));
            return $this->redirect(['site/account']);
        }


        $project = Project::find()
            ->where(['status' => Project::STATUS_ACTIVE])
            ->one();


        if (Yii::$app->request->post('tokensToInvest')) {
            $tokensToInvest = str_replace(',', '.', Yii::$app->request->post('tokensToInvest'));
            if (!is_numeric($tokensToInvest)) {
                MgHelpers::setFlashError(Yii::t('db', 'Invalid value'));
                return $this->render('buy', []);
            }

            $payment = new Payment();
            $payment->amount = $tokensToInvest * MgHelpers::getSetting('token rate', false, 2);

            $payment->user_id = $this->getUserModel()->id;
            $payment->status = Payment::STATUS_NEW;
            $payment->project_id = $project->id;
            $payment->percentage = rand(1000, 10000); //sessionId
            $payment->user_token = 'aaa';
            $payment->save();
            $toHash = (int)$payment->percentage . number_format($payment->amount, 2,'.','') . $payment->id . MgHelpers::getConfigParam('tokeneoShopId') . MgHelpers::getConfigParam('tokeneoToken');
            $payment->user_token = hash('sha256', $toHash);
            $payment->save();
            

            return $this->render('buyTokeneo', ['payment' => $payment, 'user' => $this->getUserModel()]);

        }


        return $this->render('buy', []);
    }

    public function beforeAction($action)
    {
        if ($action->id == 'notify') {
            $this->enableCsrfValidation = false;
        }
        return true;
    }

    public function actionNotify()
    {
        \Yii::info("notify", 'own');
        if (Yii::$app->request->post('session_id') && Yii::$app->request->remoteIP == MgHelpers::getConfigParam('tokeneoIp')) {
            $status = Yii::$app->request->post('status');
            $payment = Payment::find()->where(['percentage' => Yii::$app->request->post('session_id')])->one();
            if(!$payment){
                \Yii::info('No payment found for session id ' . Yii::$app->request->post('session_id'), 'own');
                return 'error';
            }
            switch ($status) {
                case 'Confirmed':
                    $payment->status = Payment::STATUS_PAYMENT_CONFIRMED;
                    $project = Project::find()
                        ->where(['status' => Project::STATUS_ACTIVE])
                        ->one();
                    $project->money += $payment->amount;
                    $project->save();

                    break;
                case 'Canceled':
                    $payment->status = Payment::STATUS_SUSPENDED;
                    break;
                default:
                    $payment->status = Payment::STATUS_UNKNOWN;
                    break;
            }
            $saved = $payment->save();

            \Yii::info('session id ' . Yii::$app->request->post('session_id'), 'own');
            \Yii::info($status, 'own');
            \Yii::info('saved ' . $saved, 'own');

            return 'OK';
        }else{
            \Yii::info('Wrong IP '.Yii::$app->request->remoteIP, 'own');
        }
    }

    public function actionBuyThankYou($hash)
    {
        $hashDecrypt = MgHelpers::decrypt($hash);
        if (!$hashDecrypt) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }
        $hashExploded = explode(':', $hashDecrypt);
        $userId = $hashExploded[0];
        $projectId = $hashExploded[1];
        $userModel = MgHelpers::getUserModel();
        if ($userId != $userModel->id) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }
        $model = Project::findOne($projectId);
        if (!$model) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }
        $model->language = Yii::$app->language;
        return $this->render('buyThanks', [
            'model' => $model,
        ]);
    }

    private function getCryptocurrency($currency)
    {
        $url = "https://api.alternative.me/v2/ticker/" . $currency . "/";
        $response = Json::decode(file_get_contents($url));
        return $response;
    }

    public function actionCalculator()
    {

        $btc = $this->getCryptocurrency('bitcoin');
        $eth = $this->getCryptocurrency('ethereum');

        $output = [];
        $btc_value = $btc['data']['1']['quotes']['USD']['price'];
        $eth_value = $eth['data']['1027']['quotes']['USD']['price'];

        if (isset($_POST['capital'])) {
            $capital = $_POST['capital'];
            $output['capital'] = $capital;
            $output['capital_btc'] = $capital / $btc_value;
            $output['capital_eth'] = $capital / $eth_value;

        } elseif (isset($_POST['capital_eth'])) {


            $capital_eth = $_POST['capital_eth'];
            $capital = $capital_eth * $eth_value;

            $output['capital'] = $capital;
            $output['capital_btc'] = $capital / $btc_value;
            $output['capital_eth'] = $capital_eth;

        } elseif (isset($_POST['capital_btc'])) {

            $capital_btc = $_POST['capital_btc'];
            $capital = $capital_btc * $btc_value;

            $output['capital'] = $capital;
            $output['capital_btc'] = $capital_btc;
            $output['capital_eth'] = $capital / $eth_value;

        }

        $output['income'] = $capital + ($capital * (intval(($_POST['percentage'])) / 100 * $_POST['investition_time']));

        return json_encode($output);
    }

    public function actionTokenomia()
    {
        $project = Project::find()
            ->where(['status' => Project::STATUS_ACTIVE])
            ->one();

        return $this->render('view', ['model' => $project]);
    }

    public function actionBuyTest()
    {

        return $this->render('buyTest');
    }
}
