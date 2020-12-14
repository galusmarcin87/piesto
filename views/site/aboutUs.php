<?php

use yii\web\View;
use app\components\mgcms\MgHelpers;


/* @var $this yii\web\View */

$this->title = Yii::t('db', 'Would you like to invest');

?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section">
    <div class="container">
        <h2>
            <?= Yii::t('db', 'About us'); ?>
        </h2>
        <div class="row animatedParent">
            <div
                    class="col-md-6 Section__text fadeIn animated"
                    style="padding-top: 20px;"
            >
                <?=MgHelpers::getSettingTypeText('about us - text '.Yii::$app->language, true, '<p>
              <strong>
                Platforma Riva Finance Crowdsale
              </strong>
              <b>
              powstała w odpowiedzi na potrzeby branży nieruchomości. Od kilkunastu lat zajmuijemy 
              się nowymi technologiami specjalizując się przede wszysstkim w Inwestycha
              (ok. tysiąca zrealizowanych projektów programistycznych dla
              znanych marek z niemal każdej branży) oraz Blockchain - 
              tworzenie Smart Kontraktów i tokenizacja (ICO, STO) a także ich
              zastosowania w biznesie, szczgólnie w branży nieruchomości.
              </b>
            </p>
            <p>
              Doświadczenie związane z Blockchain nabyliśmy biorąc udziaw i
              tworząc projekty dla różnych branż m.in kamieni szlachetnych w
              kontekście inwestycyjnym (piersza na świecie tokenizacja aktywów
              dimentowych)
            </p>')?>
            </div>
            <div class="col-sm-6 fadeIn animated">
                <img
                        style="margin-left: -50px;"
                        class="Section__image"
                        src="/images/img_03.jpg"
                        alt=""
                />
            </div>
        </div>
    </div>
</section>
<section class="Section Section--white">
    <div class="container">
        <div class="List-grid-nth">
            <div class="List-grid-nth__item">
                <div>
                    <img src="/images/ico_07.png" alt="">
                </div>
                <div>
                    <p>
                        <strong><?= MgHelpers::getSettingTranslated('about - us 1 header','about - us 1 header')?></strong><br>
                        <?= MgHelpers::getSettingTranslated('about - us 1 text','about - us 1 text')?>
                    </p>
                </div>
            </div>
            <div class="List-grid-nth__item">
                <div>
                    <img src="/images/ico_11.png" alt="">
                </div>
                <div>
                    <p>
                        <strong><?= MgHelpers::getSettingTranslated('about - us 12header','about - us 2 header')?></strong><br>
                        <?= MgHelpers::getSettingTranslated('about - us 2 text','about - us 2 text')?>
                    </p>
                </div>
            </div>
            <div class="List-grid-nth__item">
                <div>
                    <img src="/images/ico_13.png" alt="">
                </div>
                <div>
                    <p>
                        <strong><?= MgHelpers::getSettingTranslated('about - us 3 header','about - us 3 header')?></strong><br>
                        <?= MgHelpers::getSettingTranslated('about - us 3 text','about - us 3 text')?>
                    </p>
                </div>
            </div>
            <div class="List-grid-nth__item">
                <div>
                    <img src="/images/ico_17.png" alt="">
                </div>
                <div>
                    <p>
                        <strong><?= MgHelpers::getSettingTranslated('about - us 4 header','about - us 4 header')?></strong><br>
                        <?= MgHelpers::getSettingTranslated('about - us 4 text','about - us 4 text')?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->render('/common/news') ?>
<?= $this->render('/common/newsletterForm') ?>
