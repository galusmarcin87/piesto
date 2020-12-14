<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\mgcms\db\User */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\Tabs;


?>
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',

    'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(false),
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'User-Panel__form Contact-form animatedParent',]
]);

//          echo $form->errorSummary($model);
?>
    <div class="fadeIn animated">

        <div class="User-Panel__form-group">
            <?= $form->field($model, 'first_name')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'last_name')->textInput(['placeholder' => ' ']) ?>
        </div>
        <div class="User-Panel__form-group">
            <?= $form->field($model, 'country')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'voivodeship')->textInput(['placeholder' => ' ']) ?>
        </div>
        <div class="User-Panel__form-group">
            <?= $form->field($model, 'postcode')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'city')->textInput(['placeholder' => ' ']) ?>
        </div>
        <div class="User-Panel__form-group">
            <?= $form->field($model, 'street')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'flat_no')->textInput(['placeholder' => ' ']) ?>
        </div>
        <br/><br/>
        <div class="User-Panel__form-group">
            <?= $form->field($model, 'citizenship')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'id_document_type')->textInput(['placeholder' => ' ']) ?>
        </div>
        <div class="User-Panel__form-group">
            <?= $form->field($model, 'id_document_no')->textInput(['placeholder' => ' ']) ?>
            <?= $form->field($model, 'pesel')->textInput(['placeholder' => ' ']) ?>
        </div>
        <div class="Form__group form-group text-left checkbox">
            <?= $form->field($model, 'acceptTerms')->checkbox() ?>
        </div>
        <input
                class="btn btn-primary"
                type="submit"
                value="<?= Yii::t('db', 'SAVE CHANGES'); ?>"
        />

    </div>
    <div class="fadeIn animated">
        <div class="User-Panel_profile"  style="display: none">
            <label class="User-Panel__label">
                <?= Yii::t('db', 'YOUR PROFILE PHOTO'); ?>
            </label>
            <div class="text-center User-Panel__block">
                <? if (!$model->file_id): ?>
                    <img src="/images/avatar_03.jpg" alt=""/>
                <? else: ?>
                    <img src="<?= $model->file->getImageSrc(160, 160) ?>" alt=""/>
                <? endif; ?>
                <div class="User-Panel__block__action">
                    <?= \kartik\widgets\FileInput::widget([
                        'name' => 'User[file_id]',
                        'pluginOptions' => [
                            'showCaption' => false,
                            'showRemove' => false,
                            'showUpload' => false,
                            'showPreview' => false,

                            'browseClass' => 'btn btn-success',
//                                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' => Yii::t('db', 'SELECT PHOTO')
                        ],
                        'options' => ['accept' => 'image/*']
                    ]);
                    ?>
                    <a href="<?= \yii\helpers\Url::to(['site/remove-photo']) ?>" class="btn btn-primary">
                        <?= Yii::t('db', 'REMOVE PHOTO'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="User-Panel_password">

            <label class="User-Panel__label">
                <?= Yii::t('db', 'SET UP NEW PASSWORD'); ?>
            </label>
            <div class="text-center User-Panel__block">
                <? $fieldClass = 'text-left User-Panel__form-group User-Panel__form-group--block' ?>
                <?= $form->field($model, 'oldPassword', ['options' => ['class' => $fieldClass]])->passwordInput(['placeholder' => ' ']) ?>
                <?= $form->field($model, 'password', ['options' => ['class' => $fieldClass]])->passwordInput(['placeholder' => ' ', 'value' => ''])->label(Yii::t('db','New password')) ?>
                <?= $form->field($model, 'passwordRepeat', ['options' => ['class' => $fieldClass]])->passwordInput(['placeholder' => ' ']) ?>
                <input
                        type="submit"
                        class="btn btn-primary"
                        name="passwordChanging"
                        value="<?= Yii::t('db', 'SAVE CHANGES'); ?>"
                />
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>