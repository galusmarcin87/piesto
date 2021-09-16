<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\mgcms\db\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\Tabs;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(false);

?>

<section class="Section Section--big-padding-top Contact fillAccount accountMyData">
    <div class="">
        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'class' => 'fadeInUpShort animated delay-250',
            'fieldConfig' => $fieldConfig
        ]);

        //          echo $form->errorSummary($model);
        ?>

        <div class="row">
            <?= $this->render('../fillAccount/_personForm', ['form' => $form, 'model' => $model]) ?>

            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'citizenship', 'required' => true, 'addOpts' => ['disabled' => true]]) ?>
            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'id_document_type', 'required' => true]) ?>
            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'id_document_no', 'required' => true, 'addOpts' => ['disabled' => true]]) ?>
            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'pesel', 'required' => true, 'addOpts' => ['disabled' => true]]) ?>

            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'phone', 'required' => true, 'addOpts' => ['disabled' => true]]) ?>
            <?= $this->render('../fillAccount/_field', ['width' => 3, 'form' => $form, 'model' => $model, 'attribute' => 'bank_no', 'required' => true, 'addOpts' => ['disabled' => true]]) ?>

            <div class="col-md-3">
                <a href="<?= \yii\helpers\Url::to('site/verify-fiber-id') ?>"
                   class="btn btn-default verify top10"><?= Yii::t('db', 'Update bank number by Piber ID') ?></a>
            </div>

        </div>

        <div class="row top10">
            <div class="Form__group form-group text-left col-md-12">
                <input type="hidden" name="User[is_corespondence]" value="0">
                <input
                        name="User[is_corespondence]"
                        class="Form__checkbox"
                        type="checkbox"
                        id="is_corespondence"
                        value="1"
                    <?= $model->is_corespondence ? 'checked' : '' ?>
                />
                <label for="is_corespondence"> <?= Yii::t('db', 'Another address for correspondence'); ?> </label>
            </div>
        </div>

        <div class="row isCorrespondenceWrapper <?= $model->is_corespondence ? '' : 'hidden' ?>">
            <?= $this->render('../fillAccount/_corespondenceForm', ['form' => $form, 'model' => $model]) ?>
        </div>


        <div class="row bottom10">
            <div class="col-md-6 offset-3">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('<?= Yii::t('db','Are you sure to make changes?')?>')">
                        <?= Yii::t('db', 'Save changes') ?>
                    </button>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>
<script>
  $('#is_corespondence').change(function (e) {
    if ($(this).is(':checked')) {
      $('.isCorrespondenceWrapper').removeClass('hidden');
      $('.isCorrespondenceWrapper input').each(function () {
        $(this).attr('required', 1);
      });
    }
    else {
      $('.isCorrespondenceWrapper').addClass('hidden');
      $('.isCorrespondenceWrapper input').each(function () {
        $(this).attr('required', false);
      });
    }
  });
</script>
