<?php
/* @var $this yii\web\View */

/* @var $model \app\models\ReportRealEstateForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$this->title = MgHelpers::getSettingTranslated('real_estate_report_header', 'Real estate report');


?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Section--big-padding-top Contact animatedParent">
    <div class="container fadeIn animated">
        <div class="text-center"><b><?= Yii::t('db', 'Real estate report'); ?></b></div>

        <div class="row">
            <div class="col-lg-12" style="padding-left: 0">
                <div class="Contact-form">

                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(false)
                    ]);

                                        echo $form->errorSummary($model);
                    ?>
                    <div class="Contact-form__form-group form-group">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>
                    </div>
                    <div class="Contact-form__form-group form-group">
                        <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname')]) ?>
                    </div>

                    <div class="Contact-form__form-group form-group">
                        <?= $form->field($model, 'companyName')->textInput(['placeholder' => $model->getAttributeLabel('companyName')]) ?>
                    </div>

                    <div class="Contact-form__form-group form-group">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                    </div>

                    <div class="Contact-form__form-group form-group">
                        <?= $form->field($model, 'body')->textarea(['placeholder' => $model->getAttributeLabel('body'),'rows'=>4]) ?>
                    </div>

                    <div class="Contact-form__form-group form-group">
                        <?= $form
                            ->field($model, 'uploadedFiles[]',['inputOptions' => ['class' => '']])
                            ->fileInput(['multiple' => true, 'accept' => 'image/*,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document']);?>
                    </div>



                    <div class="text-right">
                        <button
                                type="submit"
                                class="Contact-form__submit btn btn-success btn-block"
                        >
                            <?= Yii::t('db', 'Send message'); ?>
                        </button>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
