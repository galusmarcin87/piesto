<?php
/* @var $model app\models\mgcms\db\Project */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;

$this->title = $model->name;
$model->language = Yii::$app->language;
if (!$model->money_full) {
    return false;
}

$index = 0;
?>
<style>
    .Project__content {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: var(--grid);
        grid-template-columns: var(--grid);
        grid-column-gap: var(--gap);
        margin-bottom: 30px;
    }
</style>
<?= $this->render('/common/breadcrumps') ?>

<section class="Section Project">
    <div class="container">
        <h1 class="text-center"><?= $model->name ?></h1>
        <div class="Project__content">
            <div class="Project__info__content">
                <?= $this->render('view/table', ['model' => $model]) ?>

                <div class="Invest-counter">
                    <div class="Invest-counter__header">
                        <div class="Invest-counter__source">
                        <span class="Invest-counter__source__value"
                        ><?= $model->money ?> PLN</span
                        >
                            (<span
                                    data-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                                    class="Invest-counter__source__percent"
                            >0</span
                            >%)
                        </div>
                        <div class="Invest-counter__target">
                            cel: <?= $model->money_full ?> PLN
                        </div>
                    </div>
                    <div class="Invest-counter__value-line-wrapper">
                        <div
                                data-to="<?= $model->money ?>"
                                data-slide-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                                class="Invest-counter__value-line"
                                style="width: 0%"
                        ></div>
                    </div>

                    <div class="Invest-counter__body">
                        <div class="Invest-counter__body__heading">
                            <?= Yii::t('db', 'Time left'); ?>:
                        </div>
                        <div
                                data-date="<?= $model->date_crowdsale_end ?>"
                                class="Count-down-timer"
                        >
                            <div class="Count-down-timer__day">
                                <span></span> <?= Yii::t('db', 'days'); ?>
                            </div>
                            <div class="Count-down-timer__hour">
                                <span></span> <?= Yii::t('db', 'hours'); ?>
                            </div>
                            <div class="Count-down-timer__minute">
                                <span></span> <?= Yii::t('db', 'minutes'); ?>
                            </div>
                            <div class="Count-down-timer__second">
                                <span></span> <?= Yii::t('db', 'seconds'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <b>Pliki do pobrania TODO</b>
                <div>
                    <div class="Project__file">
                        Nazwa pliku, który chcemy pobrać
                        <div class="Project__file__ico">
                            <img src="./svg/pdf.svg" alt=""/>
                        </div>
                    </div>
                    <div class="Project__file">
                        Nazwa pliku, który chcemy pobrać
                        <div class="Project__file__ico">
                            <img src="./svg/pdf.svg" alt=""/>
                        </div>
                    </div>
                    <div class="Project__file">
                        Nazwa pliku, który chcemy pobrać
                        <div class="Project__file__ico">
                            <img src="./svg/pdf.svg" alt=""/>
                        </div>
                    </div>
                    <div class="Project__file">
                        Nazwa pliku, który chcemy pobrać
                        <div class="Project__file__ico">
                            <img src="./svg/pdf.svg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Project__info">
                <div class="Project__gallery__photo">
                    <?if($model->file && $model->file->isImage()):?>
                        <a href="<?= $model->file->getImageSrc() ?>">
                            <img src="<?=$model->file->getImageSrc(560, 410)?>" class="Project__photo"/>
                        </a>
                    <?endif?>

                </div>
                <div class="Project__slider">
                    <div class="owl-carousel Gallery__wrapper">
                        <? foreach ($model->files as $file): ?>
                            <? if ($file->isImage()): $index++; ?>
                                <a
                                        class="item"
                                        href="<?= $file->getImageSrc() ?>"
                                        style="background-image: url(<?= $file->getImageSrc(560, 410) ?>)"
                                </a>
                            <? endif; ?>
                        <? endforeach; ?>

                    </div>
                </div>
                <div class="Project__map" id="map"></div>
            </div>
        </div>
        <p>
            <b>
                980 m kwadratowych luksusowych apartamentów zlokalizowanych w
                pięknej, zielonej, spokojnej okolicy. Każdy z apartamentów ma dostęp
                do (od 10 do 15 metrowych) balkonów, skąd można podziwiać wspaniały
                widok na pobliskie lasy, a z dystansu na panoramę miasta. 980 m
                kwadratowych luksusowych apartamentów zlokalizowanych w pięknej,
                zielonej, spokojnej okolicy. Każdy z apartamentów ma dostęp do (od
                10 do 15 metrowych) balkonów, skąd można podziwiać wspaniały widok
                na pobliskie lasy, a z dystansu na panoramę miasta.
            </b>
        </p>
        <ul class="List-custm__checklist">
            <li class="List-custm__checklist__item">
                <strong>Apartament w Warszawie</strong> z 52 mieszkaniami od 38m do
                75 m oraz 12 garażami, dodatkowo plac zabaw, parking 50 miejscapi
                oraz strefa zielona.
            </li>
            <li class="List-custm__checklist__item">
                <strong> Budowa apartamentowca rozpocznie się w 2020 r.</strong>

                będzie realizowana w 2 etapach, a każdy z nich nie będzie
                przekraczał roku kalendarzowego.
            </li>
            <li class="List-custm__checklist__item">
                <strong> Budowa apartamentowca rozpocznie się w 2020 r.</strong>

                będzie realizowana w 2 etapach, a każdy z nich nie będzie
                przekraczał roku kalendarzowego.
            </li>
            <li class="List-custm__checklist__item">
                <strong>Apartament w Warszawie</strong> z 52 mieszkaniami od 38m do
                75 m oraz 12 garażami, dodatkowo plac zabaw, parking 50 miejscapi
                oraz strefa zielona.
            </li>
        </ul>
        <div class="container">
            <div class="text-center">
                <a class="btn btn-success btn--medium" href="#">ZAINWESTUJ</a>
            </div>
            <div class="White-text-block">
                <div>
                    <h5 class="White-text-block__header">
                        <strong>Masz pytania?</strong><br/>
                        Chętnie odpowiemy.<br/>
                        Skontaktuj się z nami.
                    </h5>
                </div>
                <div>
                    <div class="White-text-block__subheader">Adam Kowalski</div>
                    <div class="White-text-block__role">
                        Specjalista ds. inwestycji
                    </div>
                    <div class="White-text-block__desc">
                        <a href="tel+48 502 502 502">+48 502 502 502</a>
                        <br/>
                        <a href="mailto:adam.kowalski@piesto.io"
                        >adam.kowalski@piesto.io</a
                        >
                    </div>
                </div>
                <div>
                    <div class="White-text-block__subheader">Jan Nowak</div>
                    <div class="White-text-block__role">
                        Specjalista ds. inwestycji
                    </div>
                    <div class="White-text-block__desc">
                        <a href="tel+48 502 502 502">+48 502 502 502</a>
                        <br/>
                        <a href="mailto:jan.nowak@piesto.io"
                        >jan.nowak@piesto.io</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section
        class="Section Section--big-padding-top Tokenomania"
        style="padding-bottom: 0"
>
    <div class="container">
        <h2 class="O-projekcie__header"><?= Yii::t('db', 'Tokenomia'); ?></h2>
        <div class="row">
            <div class="col-lg-4">
                <h6 class="O-projekcie__text text-left">
                    <?= $model->lead ?>
                </h6>
                <div style="margin-top: 30px">
                    <a class="btn btn-primary btn-full-width"
                       href="<?= Url::to(['project/buy', 'id' => $model->id]) ?>"><?= Yii::t('db', 'INVEST'); ?></a>
                    <a class="btn btn-black btn-full-width"
                       href="<?= $model->whitepaper ?>"><?= Yii::t('db', 'WHITEPAPER'); ?></a>
                    <a class="btn btn-black btn-full-width" href="#">ONEPAGER</a>
                </div>
            </div>
            <div class="col-lg-8">
                <section class="Counter Counter--small">
                    <div class="container">


                        <div class="Slider-counter">
                            <div
                                    data-date="<?= $model->date_crowdsale_end ?>"
                                    class="Count-down-timer Count-down-timer--small"
                            >
                                <div class="Slider-counter__heading"><?= Yii::t('db', 'Left'); ?></div>
                                <div class="Count-down-timer__day"><span></span> <?= Yii::t('db', 'days'); ?></div>
                                <div class="Count-down-timer__hour">
                                    <span></span> <?= Yii::t('db', 'hours'); ?>
                                </div>
                                <div class="Count-down-timer__minute">
                                    <span></span> <?= Yii::t('db', 'minutes'); ?>
                                </div>
                                <div class="Count-down-timer__second">
                                    <span></span> <?= Yii::t('db', 'seconds'); ?>
                                </div>
                            </div>
                            <div class="Invest-counter">
                                <div class="Invest-counter__header">
                                    <div class="Invest-counter__source">
                        <span class="Invest-counter__source__value"
                        ><?= $model->money ?> PLN</span
                        >
                                        (<span
                                                data-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                                                class="Invest-counter__source__percent"
                                        >0</span
                                        >%)
                                    </div>
                                    <div class="Invest-counter__target">
                                        cel: <?= $model->money_full ?> PLN
                                    </div>
                                </div>
                                <div class="Invest-counter__value-line-wrapper">
                                    <div
                                            data-to="<?= $model->money ?>"
                                            data-slide-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                                            class="Invest-counter__value-line"
                                            style="width: 0%"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="Section Project">
        <div class="container">
            <div class="Project__info">
                <div>
                    <div class="Carousel Single-image-slider">
                        <div class="owl-carousel owl-theme animatedParent">
                            <? foreach ($model->files as $file): ?>
                                <? if ($file->isImage()): $index++; ?>
                                    <a class="Image-slider__card item" href="<?= $file->getImageSrc(1360, 768) ?>">
                                        <img
                                                class="Image-slider__image fadeIn animated"
                                                src="<?= $file->getImageSrc(822, 460) ?>"
                                                alt=""
                                        />
                                    </a>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                        <div
                                class="Custom-nav Custom-nav--color-black Single-image-slider__nav"
                        ></div>
                    </div>
                    <?= $model->text ?>
                </div>
                <div class="Project__info__content">
                    <?= $this->render('view/table', ['model' => $model]) ?>

                    <?= $this->render('view/tokenTable', ['model' => $model]) ?>

                    <?= $this->render('view/bonuses', ['model' => $model]) ?>


                </div>
            </div>
        </div>
    </section>
</section>
<section class="Section Analize animatedParent">
    <div class="container fadeIn animated">
        <?= $model->text2 ?>
    </div>
</section>


