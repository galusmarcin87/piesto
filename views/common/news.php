<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;

$category = \app\models\mgcms\db\Category::find()->where(['name' => 'aktualności ' . Yii::$app->language])->one();
if (!$category) {
    return false;
}
$articles = \app\models\mgcms\db\Article::find()->where(['category_id' => $category->id])->limit(6)->all();

$showAllButton = isset($showAllButton) ? $showAllButton : true;
?>
<section class="Section News animatedParent">
    <div class="container fadeIn animated">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="Projects__header"><?= Yii::t('db', 'News'); ?></h4>
            </div>
            <div class="col-sm-8 text-right">
                <? if ($showAllButton): ?>
                    <div class="Projects__filter">
                        <a
                                href="<?= $category->linkUrl ?>"
                                class="btn btn-success btn-success--outline btn-success--reverse-colors"
                        ><?= Yii::t('db', 'See all'); ?></a
                        >
                    </div>
                <? endif; ?>
            </div>
        </div>
        <div class="Carousel">
            <div class="owl-carousel owl-theme animatedParent">
                <? foreach ($articles as $article): ?>
                    <?= $this->render('/article/_index', ['model' => $article]); ?>
                <? endforeach; ?>

            </div>
        </div>
    </div>
</section>