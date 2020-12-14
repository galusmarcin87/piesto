<?
/* @var $this yii\web\View */

/* @var $project \app\models\mgcms\db\Project */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>
<section class="Section">
    <div class="container">
        <div class="row animatedParent">
            <div class="col-lg-6 fadeIn animated">
                <div class="Section__text">
                    <h2>
                        <?= MgHelpers::getSettingTypeText('Home section 1 - title 1 ' . Yii::$app->language, false, 'Nowa sieć gastronomiczna') ?>
                        <br/>
                        <div><?= MgHelpers::getSettingTypeText('Home section 1 - title 2 ' . Yii::$app->language, false, 'FAST FOOD') ?></div>
                    </h2>
                    <p class="color-gray">
                        <?= MgHelpers::getSettingTypeText('Home section 1 - title 3 ' . Yii::$app->language, false, 'Powstał projekt nowej sieci gastronomicznej. Jego pomysłodawcy
                        chcą stworzyć sieć innowacyjnych lokali typu fast-food, pod
                        nazwą NOL Restaurant. Restauracja będzie swoim wyglądem
                        przypominała "latający spodek".') ?>

                    </p>
                </div>
                <a class="btn btn-primary btn-small"
                   href=<?= $project->linkUrl ?>"><?= Yii::t('db', 'More about project'); ?></a>
                <br /><br />
            </div>
            <div class=" col-lg-6 fadeIn animated">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="Section__header-icon">
                            <?= $this->render('/common/svg/comet') ?>
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 2 title ' . Yii::$app->language, false, 'Innowacyjna Restauracja') ?>

                        </h3>
                        <p class="color-gray">
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 2 text ' . Yii::$app->language, false, 'Przedmiotem niniejszego przedsięwzięcia jest utworzenie
                            innowacyjnej restauracji typu fast-food, która będzie swoim
                            wyglądem przypominała „latający spodek” (NOL, czyli
                            Niezidentyfikowany Obiekt Latający). Restauracja będzie
                            oferowała dania kuchni północnoamerykańskiej z elementami
                            kuchni greckiej i meksykańskiej (dania będą dostosowane do
                            pory dnia). Restauracja będzie również oferować dania "na
                            wynos".') ?>

                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="Section__header-icon">
                            <?= $this->render('/common/svg/telescope') ?>
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 3 title ' . Yii::$app->language, false, 'Edukacja-<br/>rozrywka') ?>

                        </h3>
                        <p class="color-gray">
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 3 text ' . Yii::$app->language, false, 'Uzupełnieniem restauracji NOL Restaurant będzie ścieżka
                            edukacyjno-rozrywkowa o tematyce planetarnej. Po obwodzie
                            spotka na długości 84 metrów zostanie stworzona edukacyjna
                            ścieżka układu słonecznego. Obiekt będzie miał na celu w
                            nowoczesny sposób nauczać astronomii. W tym celu zostaną
                            wykorzystane makiety planet, wizualizacje tworzone przez
                            projektory, światła i lasery, stanowiska do projekcji VR.') ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="col-lg-6">
                <div style="height: 100%" class="row">
                    <div class="col-md-6">
                        <img class="Section__fit-image" src="<?= MgHelpers::getSetting('home section 1 - image 1',false,'/img/_MG_0022.jpg')?>"/>
                    </div>
                    <div class="col-md-6">
                        <h3><?= MgHelpers::getSettingTypeText('Home section 1 - 4 title ' . Yii::$app->language, false, 'Budowa') ?></h3>
                        <p class="color-gray">
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 4 text ' . Yii::$app->language, false, 'Restauracja zostanie w całości zbudowana ze stali, zaś
                            zewnętrzna obudowa zostanie wykonana z blachy ocynkowanej.
                            Obiekt, o średnicy 27 metrów i wysokości 12 metrów, będzie
                            składał się z dwóch poziomów, a w tym sali głównej oraz
                            antresoli. Po zachodzie słońca cała bryła obiektu będzie
                            oświetlana za pomocą reflektorów umieszczonych na obiekcie,
                            jak i wokół niego. Ze względu na niespotykaną konstrukcję oraz
                            ścieżkę edukacyjno-rozrywkową, obiekt będzie atrakcją
                            turystyczną w danym regionie.') ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="height: 100%" class="row">
                    <div class="col-md-6">
                        <img
                                class="Section__fit-image Section__fit-image--center"
                                src="<?= MgHelpers::getSetting('home section 1 - image 2',false,'/img/n3.jpg')?>"
                        />
                    </div>
                    <div class="col-md-6">
                        <h3><?= MgHelpers::getSettingTypeText('Home section 1 - 5 title ' . Yii::$app->language, false, 'Lokalizacja') ?></h3>
                        <p class="color-gray">
                            <?= MgHelpers::getSettingTypeText('Home section 1 - 5 text ' . Yii::$app->language, false, 'Ze względu na charakter restauracji idealna lokalizacja to
                            działka umiejscowiona przy drodze szybkiego ruchu na obrzeżach
                            dużego miasta, gdzie występuje duże natężenie ruchu, a
                            kierowcy i podróżni chcą odpocząć i zjeść szybki posiłek.
                            Zapewni to optymalne wykorzystanie zasobów obiektu oraz
                            realizację przyjętych założeń sprzedażowych. Po sfinalizowaniu
                            założonego celu, czyli otwarciu pierwszej restauracji NOL
                            Restaurant, spółka wybuduje kolejne obiekty, przy najbardziej
                            ruchliwych szlakach komunikacyjnych w Polsce (16 obiektów po
                            jednym na każde województwo).') ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>