<?php
/* @var $this yii\web\View */
/* @var $model \app\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$this->title = MgHelpers::getSettingTranslated('contact_header', 'Contact');


?>


<section class="Section Section--big-padding-top Contact animatedParent">
    <div class="container fadeIn animated">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="Contact__header text-left">
                    <?= MgHelpers::getSetting('contact_address', false, 'NOL Group Sp. z o.o. <br />
                    ul. 55 Pułku Piechoty 33/7, 64-100 Leszno') ?>

                </h3>
            </div>
            <div class="col-lg-6">
                <div class="buttons-list buttons-list--two">
                    <a
                            class="btn btn-small btn-primary--reverse"
                            href="phone:<?= MgHelpers::getSetting('contact_phone', false, '+48 784 112 895') ?>"
                    >
                        <img
                                class="buttons-list__icon"
                                src="/svg/telefon.svg"
                                alt=""
                        />
                        <?= MgHelpers::getSetting('contact_phone', false, '+48 784 112 895') ?></a
                    >
                    <a
                            class="btn btn-small btn-primary--reverse"
                            href="mailto:<?= MgHelpers::getSetting('contact_email', false, 'info@nolgroup.pl') ?>"
                    >
                        <img class="buttons-list__icon" src="/svg/email.svg" alt="" />
                        <?= MgHelpers::getSetting('contact_email', false, 'info@nolgroup.pl') ?></a
                    >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 Contact__map-wrapper">
                <div id="map" class="Contact__map fadeIn animated"></div>
                <a
                        href="#"
                        type="submit"
                        class="Contact-form__submit Contact__map__btn btn btn-primary"
                >
                    <?= Yii::t('db', 'check how to get there'); ?>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="Contact-form">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(false)
                    ]);

//                    echo $form->errorSummary($model);
                    ?>
                        <div class="Contact-form__form-group form-group">
                            <?= $form->field($model, 'name')->textInput(['placeholder' => ' ']) ?>
                            <?= $form->field($model, 'email')->textInput(['placeholder' => ' ']) ?>
                        </div>
                        <div class="Contact-form__form-group form-group">
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => ' ']) ?>
                            <?= $form->field($model, 'subject')->textInput(['placeholder' => ' ']) ?>
                        </div>
                        <div class="Contact-form__form-group form-group">
                            <?= $form->field($model, 'body')->textarea(['placeholder' => ' ']) ?>
                        </div>
                        <div class="Form__group form-group text-left">
                            <?= $form->field($model, 'acceptTerms',
                                [
                                    'options' => [
                                        'class' => "Form__group form-group text-left",
                                    ],
                                    'checkboxTemplate' => "{input}\n{label}\n{error}",
                                ]
                            )->checkbox(['class' => 'Form__checkbox']) ?>
                        </div>
                        <div class="text-right">
                            <button
                                    type="submit"
                                    class="Contact-form__submit btn btn-primary"
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



<?= $this->render('contact/script') ?>
