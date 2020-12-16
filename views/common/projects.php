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

<section
        class="Section Projects animatedParent"
        style="padding-bottom: 75px"
>
    <div class="container fadeIn animated">

        <div class="Projects__header__wrapper">
            <h4 class="Projects__header text-center"><?= Yii::t('db', $header); ?></h4>
            <a href="<?= \yii\helpers\Url::to(['project/index']) ?>" class="btn btn--transparent btn--medium">
                <?= Yii::t('db', 'SEE ALL'); ?>
            </a>
        </div>


        <?php

        $provider = $projectSearch->search([], Project::STATUS_ACTIVE);
        $provider->pagination = false;
        $provider->query->limit(3);
        echo ListView::widget([
            'dataProvider' => $provider,
            'options' => ['class' => 'Projects__sortable animatedParent'],
            'itemOptions' => ['class' => 'Projects__card fadeIn animated item'],
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


</section>

