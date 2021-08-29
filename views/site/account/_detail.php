<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Payment */

$searchModel = new \app\models\mgcms\db\ProjectSearch();
$searchParams = ['ProjectSearch' => ['id' => $model->project->id]];
$dataProvider = $searchModel->search($searchParams);
$payment = $model;
?>
<div class="project-view">
    <h3><?= Yii::t('db', 'Details of investition') ?></h3>

    <div class="row">
        <?php
        $gridColumn = [
            ['attribute' => 'id', 'visible' => false],
            'thumbFront:raw',
            'money_full',
            'money',
            'percentage',
            [
                'label' => Yii::t('db', 'Investition date'),
                'value' => function ($model, $key, $index, $column) use ($payment){
                    return $payment->created_on;
                },
            ],
            'date_crowdsale_start',
            'date_crowdsale_end',
            [
                'label' => Yii::t('db', 'Expected return with profit'),
                'value' => function ($model, $key, $index, $column) use ($payment){
                    return $payment->getBenefitWithAmount();
                },
            ],
        ];
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumn,
            'summary' => false,
            'bordered' => false,
        ]);
        ?>
    </div>
</div>
