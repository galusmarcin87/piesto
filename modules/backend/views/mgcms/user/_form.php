<?php
use yii\helpers\Html;
use app\components\mgcms\yii\ActiveForm;
use app\components\mgcms\MgHelpers;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\User */
/* @var $form app\components\mgcms\yii\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'User',
        'relID' => 'user',
        'value' => \yii\helpers\Json::encode($model->users),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="user-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->errorSummary($model); ?>

  <div class="row">
    <div class="col-md-4">
      <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('first_name')]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('last_name')]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'role')->dropDownList(MgHelpers::arrayCombineFromOneArray(Yii::$app->params['roles']), ['maxlength' => true]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'status')->dropDownList(MgHelpers::arrayTranslateValues(\app\models\mgcms\db\User::STATUSES), ['maxlength' => true]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('email')]) ?>

    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'birthdate')->datePicker(); ?>
    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('city')]) ?>

    </div>



  </div>


  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
