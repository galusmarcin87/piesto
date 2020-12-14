<?php
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \app\models\mgcms\db\Article */
$this->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::canonical()]);

?>



<section class="Section Text Section--big-padding-top ">
    <div class="container">
        <? if ($model->file && $model->file->isImage()): ?>
          <div class="Image-singe-container">
              <img class="Image-singe" src="<?= $model->file->getImageSrc() ?>"/>
          </div>
        <? endif ?>
        <?= $model->content ?>
    </div>
</section>


<?= $this->render('/common/newsletterForm') ?>
