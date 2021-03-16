<?
/* @var $model \app\models\ReportRealEstateForm */
/* @var $files \app\models\mgcms\db\File[] */

?>

<h1><?= Yii::t('db', 'Real estate report'); ?></h1>

<p>Imię: <?= $model->name ?></p>
<p>Nazwisko: <?= $model->surname ?></p>
<p>E-mail: <?= $model->email ?></p>
<p>Nazwa firmy: <?= $model->companyName ?></p>
<p>Opis nieruchomości: <?= $model->body ?></p>

<h6>Załaczniki:</h6>
<ul>
    <? foreach ($files as $file): ?>
        <li><a href="<?= \yii\helpers\Url::base(true) . $file->getWebPath() ?>"><?= $file->origin_name ?></a></li>
    <? endforeach; ?>
</ul>


