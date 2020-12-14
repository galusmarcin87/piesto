<?php
/* @var $model app\models\mgcms\db\Project */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $payment app\models\mgcms\db\Payment */
/* @var $form app\components\mgcms\yii\ActiveForm */


?>

<section class="Section Section--big-padding-top Contact animatedParent">
    <div class="container">
        <h3>
            <?= Yii::t('db', 'Buy tokens'); ?>
        </h3>
        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
        ]);

        ?>

        <div class="fadeIn animated">
            <div class="User-Panel__form-group">
                <label class="Contact-form__label field-user-first_name">
                    <div class="Contact-form__label">
                        <?= Yii::t('db', 'Tokens to invest'); ?>
                        <input type="text" id="tokensToInvest"
                               class="Contact-form__input form-control"
                               name="tokensToInvest"
                               placeholder=" ">

                        <p class="help-block help-block-error"></p>
                    </div>
                    <div class="Contact-form__label">
                        <?= Yii::t('db', 'Value in PLN'); ?>
                        <input type="text" id="plnToInvest"
                               class="Contact-form__input form-control"
                               name="plnToInvest"
                               placeholder=" ">

                        <p class="help-block help-block-error"></p>
                    </div>
                </label>
            </div>
        </div>

        <div class="text-center">
            <input
                    type="submit"
                    class="Contact-form__submit btn btn-primary btn-block"
                    value="<?= Yii::t('db', 'Buy'); ?>"
            />
        </div>


        <?php ActiveForm::end(); ?>
    </div>
</section>

<script>
    $( document ).ready(function() {
        var tokenRate = <?=MgHelpers::getSetting('token rate', false, 2)?>;
      $('#tokensToInvest').on('input', function() {
          $('#plnToInvest').val($(this).val() * tokenRate);
      });
    });
</script>