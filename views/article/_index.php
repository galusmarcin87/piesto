<?php

use \yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Article */
?>

<div class="item fadeIn animated">
    <div class="Card">
        <div class="Card__img-wrapper">
            <a href="<?= $model->linkUrl ?>">
                <? if ($model->file && $model->file->isImage()): ?>
                    <img class="Card__img" src="<?= $model->file->getImageSrc(643, 447) ?>"/>
                <? endif ?>
            </a>
        </div>
        <div class="Card__body">
            <div class="Card__date">
                <?= date('d m Y', strtotime($model->created_on)) ?>
            </div>
            <h4 class="Card__header">
                <?= $model->title ?>
            </h4>
            <div class="card-text">
                <?= $model->excerpt ?>
            </div>

            <a class="Card__link btn btn-success btn-success--outline btn-success--reverse-colors"
               href="<?= $model->linkUrl ?>">
                <?= Yii::t('db', 'Read more'); ?> <span class="Card__arrow">→</span>
            </a>
        </div>
    </div>
</div>