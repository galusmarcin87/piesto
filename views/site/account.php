<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\mgcms\db\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\Tabs;

$this->title = Yii::t('db', 'My account');
$this->params['breadcrumbs'][] = $this->title;


?>

<section class="Section Section--big-padding-top Contact animatedParent"></section>


<section class="Section Section--big-padding-top Contact animatedParent myAccount">
    <div class="container">
        <div class="userMain row">
            <div class="col-md-1">
                asdsa
            </div>
            <div class="col-md-10">
                <h1><?= Yii::t('db', 'Hello') ?> <?= $model ?></h1>
                <p><?= Yii::t('db', 'Number of projects invested') ?>: <?= count($model->payments) ?></p>
                <p><?= Yii::t('db', 'The amount of funds invested') ?>
                    : <?= array_sum(array_column($model->payments, 'amount')); ?></p>
                <p><?= Yii::t('db', 'Assumed profit') ?>: </p>
            </div>

        </div>


        <div class="tabs">
            <?
            $tabsItems = [
                [
                    'label' => MgHelpers::getSettingTranslated('account_tab1', 'My investitions'),
                    'content' => $this->render('account/tokens', [
                        'payments' => $model->payments
                    ]),
                    'options' => ['id' => 'myTokens'],
                ],
                [
                    'label' => MgHelpers::getSettingTranslated('account_tab2', 'My data'),
                    'content' => $this->render('account/data', [
                        'model' => $model
                    ]),
                    'options' => ['id' => 'myAccount'],
                ],
            ];

            echo Tabs::widget([
                'items' => $tabsItems,
                'linkOptions' => [
                    'class' => 'btn btn-default'
                ]
            ]);

            ?>
        </div>

    </div>
</section>
