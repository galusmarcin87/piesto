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

<section class="Section Section--big-padding-top accountSettings">


    <div class="row">
        <div class="col-md-6">
            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'fadeInUpShort animated delay-250',
                'fieldConfig' => $fieldConfig
            ]);

            //          echo $form->errorSummary($model);
            ?>

            <div class="row">
                <div class="col-md-8"><?= $form->field($model, 'email')->textInput() ?></div>
                <div class="col-md-4">
                    <button class="btn inputFit"
                            onclick="return confirm('<?= Yii::t('db', 'Are you sure to make changes?') ?>')">
                        <?= Yii::t('db', 'Change') ?>
                    </button>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'fadeInUpShort animated delay-250',
                'fieldConfig' => $fieldConfig
            ]);

            //          echo $form->errorSummary($model);
            ?>
            <h3><?= Yii::t('db', 'Password') ?></h3>
            <?= $form->field($model, 'oldPassword')->passwordInput(['placeholder' => Yii::t('db', 'Old password')]) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('db', 'New password')]) ?>
            <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => Yii::t('db', 'Password repeat')]) ?>

            <button type="submit" class="btn btn-success btn-block" name="passwordChanging"
                    onclick="return confirm('<?= Yii::t('db', 'Are you sure to make changes?') ?>')">
                <?= Yii::t('db', 'Save changes') ?>
            </button>

            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-md-5 offset-1">
            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',

                'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(true),
                'options' => ['enctype' => 'multipart/form-data', 'class' => 'User-Panel__form Contact-form animatedParent',]
            ]);

            //          echo $form->errorSummary($model);
            ?>
            <div class="User-Panel_profile">
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
                <button type="submit" class="btn btn-success btn-block" name="imageSave"
                        onclick="return confirm('<?= Yii::t('db', 'Are you sure to make changes?') ?>')">
                    <?= Yii::t('db', 'Save changes') ?>
                </button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</section>
