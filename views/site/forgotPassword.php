<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ForgotPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('db', 'Forgotten password');
?>
<?= $this->render('/common/breadcrumps')?>

<section class="Section Section--white Register animatedParent">
    <div class="container fadeIn animated">

        <div class="User-Panel__form User-Panel__form--block">
            <div>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig()
                ]);

                //          echo $form->errorSummary($model);

                ?>

                <div class="User-Panel__form-group">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => ' ']) ?>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success" href="#"><?= Yii::t('db', 'Send'); ?><span></span>
                    </button>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

