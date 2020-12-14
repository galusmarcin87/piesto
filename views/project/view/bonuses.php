<?

use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model Project */

?>

<ul class="List-custom__two">
    <li class="List-custom__two__item">
                  <span>
                    <strong> <span><?= Yii::t('db', 'Bonus'); ?></span></strong>
                  </span>
        <div></div>
    </li>
    <? foreach ($model->bonuses as $bonus): ?>
        <li class="List-custom__two__item">
            <span> <?= $bonus->from ?>-<?= $bonus->to ?> <?= Yii::t('db', 'tokens'); ?>: </span>
            <span> $<?= $bonus->value ?> </span>
        </li>
    <? endforeach; ?>
</ul>
