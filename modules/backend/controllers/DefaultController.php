<?php
namespace app\modules\backend\controllers;

use app\modules\backend\components\mgcms\MgBackendController;
use Yii;
use app\models\LoginForm;

/**
 * Default controller for the `backend` module
 */
class DefaultController extends MgBackendController
{

  /**
   * Renders the index view for the module
   * @return string
   */
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', [
            'model' => $model,
    ]);
  }
}
