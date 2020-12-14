<?php

use yii\web\View;
use app\components\mgcms\MgHelpers;


/* @var $this yii\web\View */

$this->title = Yii::t('db', 'Would you like to invest');

?>

<?= $this->render('/common/breadcrumps') ?>

    <section
            style="background-image: url(./images/banner_01.jpg)"
            class="Section Section--light-bg Section--fixed-bg animatedParent Section--fixed-bg-custom"
    >
        <div class="container fadeIn animated">
            <div class="row">
                <div class="col-md-6 col-sm-8">
                    <h2>
                        <?= MgHelpers::getSettingTranslated('Invest - title', 'Invest - title') ?>

                    </h2>
                    <h6>
                        <?= MgHelpers::getSettingTranslated('Invest - header', 'Invest - header') ?>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <section class="Section Section--white animatedParent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>
                            <?= MgHelpers::getSettingTranslated('Invest - left orange', 'Invest - left orange') ?>
                        </strong>
                        <?= MgHelpers::getSettingTranslated('Invest - left', 'Invest - left') ?>
                    </p>
                    <p>
                        <small>
                            <?= MgHelpers::getSettingTranslated('Invest - left small', 'Invest - left small') ?>
                        </small>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong><?= MgHelpers::getSettingTranslated('Invest - right orange', 'Invest - right orange') ?></strong>
                        <?= MgHelpers::getSettingTranslated('Invest - right', 'Invest - right') ?>
                    </p>
                    <p>
                        <small>
                            <?= MgHelpers::getSettingTranslated('Invest - right small', 'Invest - right small') ?>
                        </small>
                    </p>
                </div>
            </div>
            <img class="Image--spacing" src="/images/banner_02.jpg" alt=""/>
        </div>
        <div class="container fadeIn animated">
            <h4><?= Yii::t('db', 'How to invest'); ?></h4>
            <div class="List-grid List-grid--numbers">
                <div class="List-grid__item">
                    <h6 class="List-grid__item__header"><?= MgHelpers::getSettingTranslated('Invest - 1 column header', 'Invest - 1 column header') ?></h6>
                    <p class="List-grid__item__content">
                        <?= MgHelpers::getSettingTranslated('Invest - 1 column text', 'Invest - 1 column text') ?>
                    </p>
                </div>
                <div class="List-grid__item">
                    <h6 class="List-grid__item__header"><?= MgHelpers::getSettingTranslated('Invest - 2 column header', 'Invest - 2 column header') ?></h6>
                    <p class="List-grid__item__content">
                        <?= MgHelpers::getSettingTranslated('Invest - 2 column text', 'Invest - 2 column text') ?>
                    </p>
                </div>
                <div class="List-grid__item">
                    <h6 class="List-grid__item__header"><?= MgHelpers::getSettingTranslated('Invest - 3 column header', 'Invest - 3 column header') ?></h6>
                    <p class="List-grid__item__content">
                        <?= MgHelpers::getSettingTranslated('Invest - 3 column text', 'Invest - 3 column text') ?>
                    </p>
                </div>
            </div>
        </div>
    </section>


<?= $this->render('/common/newsletterForm') ?>