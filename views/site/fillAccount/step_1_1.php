<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \app\models\mgcms\db\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;


$this->title = Yii::t('db', 'Register');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(false);

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Section--big-padding-top Contact fillAccount">
    <div class="container">
        <h1 class="text-center"><?= Yii::t('db', 'Register'); ?></h1>
        <div class="Contact__grid">
            <?= $this->render('steps', ['step' => $step]) ?>
            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'fadeInUpShort animated delay-250',
                'fieldConfig' => $fieldConfig
            ]);

            //          echo $form->errorSummary($model);
            ?>
            <div class="row">
                <?= $this->render('_field', ['width' => 6, 'form' => $form, 'model' => $model, 'attribute' => 'first_name', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 6, 'form' => $form, 'model' => $model, 'attribute' => 'last_name', 'required' => true]) ?>

                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'country', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'voivodeship', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'postcode', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'city', 'required' => true]) ?>

                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'street', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'house_no', 'required' => true]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'flat_no', 'required' => false]) ?>
                <?= $this->render('_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'birthdate', 'required' => true, 'type' => 'date']) ?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="text-left">
                        <button type="submit" class="btn arr-right-blue">
                            <?= Yii::t('db', 'BACK') ?>
                        </button>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="text-right">
                        <button type="submit" class="btn arr-right-blue">
                            <?= Yii::t('db', 'NEXT') ?>
                        </button>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>


<script>

  $('.buttons .btn').click(function (e) {
    $('.buttons .btn').removeClass('btn-success');
    $(this).addClass('btn-success');
    $('#user-type').val($(this).data('type'));
  });
</script>
