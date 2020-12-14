<?

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;
use yii\widgets\ListView;

$projectSearch = new \app\models\mgcms\db\ProjectSearch();
$projectSearch->limit = 6;


$tabsStatuses = [Project::STATUS_ACTIVE];
$tabsConfig = [];
foreach ($tabsStatuses as $status) {
    $provider = $projectSearch->search([], $status);
    $provider->pagination = false;

    $tabsConfig[] = [
        'name' => Project::STATUSES_EN[$status],
        'provider' => $provider
    ];
}


$header = isset($header) ? $header : 'Current projects';
$showLink = isset($showLink) ? $showLink : true;


?>

<section class="Section Projects animatedParent">
    <div class="container fadeIn animated">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="Projects__header"><?= Yii::t('db', $header); ?></h4>
            </div>
            <div class="col-sm-8 text-right">
                <?if($showLink):?>
                <div class="Projects__filter">
                    <a
                            href="<?= \yii\helpers\Url::to(['project/index']) ?>"
                            class="btn btn-success btn-success--outline btn-success--reverse-colors"
                    ><?= Yii::t('db', 'SEE ALL'); ?></a
                    >
                </div>
                <?endif;?>
            </div>
        </div>
    </div>

    <div class="Carousel">
        <?php

        $provider = $projectSearch->search([], Project::STATUS_ACTIVE);
        $provider->pagination = false;
        echo ListView::widget([
            'dataProvider' => $provider,
            'options' => ['class' => 'owl-carousel owl-theme Projects__sortable animatedParent'],
            'itemOptions' => ['class' => 'Projects__card fadeIn animated'],
            'emptyTextOptions' => ['class' => 'col-md-12'],
            'layout' => '{items}',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('/project/_tileItem',
                    [
                        'model' => $model,
                        'key' => $key,
                        'index' => $index,
                        'widget' => $widget,
                        'view' => $this,
                    ]);
            },
        ]);


        ?>


    </div>


</section>

