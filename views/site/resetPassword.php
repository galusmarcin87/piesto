<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChangePasswordForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('db', 'Change password');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = [
    'options' => [
        'class' => "input input--hoshi",
    ],
    'template' => "{input}\n{beginLabel}<span class=\"input__label-content input__label-content--hoshi\">{labelTitle}</span>{endLabel}\n{error}",
    'inputOptions' => ['class' => 'input__field input__field--hoshi'],
    'labelOptions' => [
        'class' => "input__label input__label--hoshi input__label--hoshi-color-2",
    ],
    'wrapperOptions' => [
        'class' => "input input--hoshi",
    ]
];

?>


<main>
  <section id="contact" class="contact login-reg">
    <div class="container animatedParent">
      <div class="row">
        <div class="col-md-6">
          <h2 class="heading-h2"><span><span><span></span></span> <?= Yii::t('db', 'Forgotten password'); ?><span><span></span> </span></span></h2>
          <?php
          $form = ActiveForm::begin([
                  'id' => 'login-form',
                  'class' => 'fadeInUpShort animated delay-250',
                  'fieldConfig' => $fieldConfig
          ]);

//          echo $form->errorSummary($model);

          ?>

          <div>
            <?= $form->field($model, 'password')->passwordInput() ?>
          </div>
          <div>
            <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>
          </div>



          <div class="text-center"><button type="submit" class="btn btn-black" href="#"><?= Yii::t('db', 'Reset'); ?><span></span></button></div>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </section>
</main>