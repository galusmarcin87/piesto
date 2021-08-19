<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\mgcms\db\User*/


?>
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

