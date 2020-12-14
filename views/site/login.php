<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;


$this->title = Yii::t('db', 'Log in');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(false)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>



<section class="Section Section--big-padding-top Contact">
    <div class="container">
        <? yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['site/auth'],
            'popupMode' => false,
        ]) ?>
        <div class="Contact__grid">
            <div class="Contact-form">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => $fieldConfig
                ]);

                echo $form->errorSummary($model);
                ?>
                <h3 class="Header-icon Header-icon--small">
                    <?= Yii::t('db', 'Log in'); ?>
                    <img class="Header-icon__icon" src="/svg/znaczek.svg" alt=""/>
                </h3>
                <div class="Contact-form__form-group form-group">
                    <?= $form->field($model, 'username')->textInput(['type' => 'text', 'required' => true, 'placeholder' => ' ']) ?>

                </div>
                <div class="Contact-form__form-group form-group">
                    <?= $form->field($model, 'password')->passwordInput(['required' => true, 'placeholder' => ' ']) ?>
                </div>
                <div class="Form__group form-group text-left">
                    <input type="hidden" name="LoginForm[rememberMe]" value="0">
                    <input
                            name="LoginForm[rememberMe]"
                            class="Form__checkbox"
                            type="checkbox"
                            id="rememberMe"
                            value="1"
                            checked
                            required
                    />
                    <label for="rememberMe"> <?= Yii::t('db', 'Remember me'); ?> </label>
                    <?= Html::a(Yii::t('db', 'Forgotten password?'), ['site/forgot-password'], ['class' => 'Contact__remember-password pull-right']) ?>

                </div>
                <div class="text-center">
                    <input
                            style="margin-top: 138px !important"
                            type="submit"
                            class="Contact-form__submit btn btn-primary btn-block"
                            value="<?= Yii::t('db', 'Log in'); ?>"
                    />
                </div>
                <?php ActiveForm::end(); ?>
            </div>


            <div class="Contact-form">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => $fieldConfig
                ]);

                //          echo $form->errorSummary($model);
                ?>
                <h3 class="Header-icon Header-icon--small">
                    <?= Yii::t('db', 'Register'); ?>
                    <img class="Header-icon__icon" src="/svg/znaczek.svg" alt=""/>
                </h3>
                <div class="Contact-form__form-group form-group">
                    <?= $form->field($modelRegister, 'username')->textInput(['type' => 'email', 'required' => true, 'placeholder' => ' ']) ?>


                </div>
                <div class="Contact-form__form-group form-group">
                    <?= $form->field($modelRegister, 'password')->passwordInput(['required' => true, 'placeholder' => ' ']) ?>

                </div>
                <div class="Contact-form__form-group form-group">
                    <?= $form->field($modelRegister, 'passwordRepeat')->passwordInput(['required' => true, 'placeholder' => ' ']) ?>
                </div>
                <div class="Contact-form__form-group form-group text-left">
                    <input type="hidden" name="RegisterForm[acceptTerms]" value="0">
                    <input
                            name="RegisterForm[acceptTerms]"
                            class="Form__checkbox"
                            type="checkbox"
                            id="agree"
                            value="1"
                            checked
                            required
                    />
                    <label for="agree">
                        <?= MgHelpers::getSettingTranslated('register_terms_label', '  Oświadczam, że zapoznałem się z <a href="#">Regulaminem</a><br>  i <a href="#">Polityką Prywatności.</a>') ?>
                    </label>
                </div>

                <div class="text-center">
                    <input
                            type="submit"
                            class="Contact-form__submit btn btn-primary btn-block"
                            value="<?= Yii::t('db', 'Register'); ?>"
                    />
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>