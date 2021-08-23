<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\mgcms\db\User*/
$type = isset($type) ? $type : 'text';

$opts = ['type' => $type, 'placeholder' => $model->getAttributeLabel($attribute)];
if($required){
    $opts['required'] = 'required';
}
?>

<div class="col-md-<?=$width?>">
    <?= $form->field($model, $attribute)->textInput($opts) ?>
</div>

