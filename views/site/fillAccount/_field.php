<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\mgcms\db\User*/
$type = isset($type) ? $type : 'text';

?>

<div class="col-md-<?=$width?>">
    <?= $form->field($model, $attribute)->textInput(['type' => $type,'required' => $required, 'placeholder' => $model->getAttributeLabel($attribute)]) ?>
</div>

