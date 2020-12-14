<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);

?>

<div class="Scroll-up">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</div>

<section class="Section Newsletter text-center animatedParent">

    <?= $this->render('/common/newsletterForm') ?>


    <footer>
        <div class="Footer">
            <div class="container">
                <div class="animatedParent">
                    <ul class="Footer__menu text-center fadeIn animated">
                        <? foreach ($menu->getItems() as $item): ?>
                            <li class="Footer__menu__item">
                                <? if (isset($item['url'])): ?>
                                    <a href="<?= \yii\helpers\Url::to($item['url']) ?>"
                                       class="Footer__menu__link <? if (isset($item['active']) && $item['active']): ?>Footer__menu__link--active<? endif ?>"><?= $item['label'] ?></a>
                                <? endif ?>
                            </li>
                        <? endforeach ?>
                    </ul>
                </div>
                <div class="Cookies">
                    <div class="container relative">
                        <a class="Cookies__close Cookies__close-btn" href="#">
                            &#215;
                        </a>
                        <?= MgHelpers::getSetting('footer cookie ' . Yii::$app->language, true, '<p>
                            Serwis wykorzystuje pliki cookies. Korzystając ze strony
                            wyrażasz zgodę na wykorzystywanie plików cookies.
                            <a class="Cookies__more-btn" href="#">Dowiedz się więcej</a>
                        </p>') ?>

                    </div>
                </div>
                <div class="animatedParent">
                    <div class="Footer__copy fadeIn animated">
                        <div>
                            <?= MgHelpers::getSetting('footer copyright 1' . Yii::$app->language, true, 'Wszelkie prawa zastrzeżone &#169; 2020 NOL restaurant
                            &nbsp;|&nbsp;
                            <a class="Footer__link" href="">Regulamin</a> &nbsp;|&nbsp;
                            <a class="Footer__link" href="">Polityka&nbsp;prywatności</a>') ?>

                        </div>
                        <div>
                            <?= MgHelpers::getSetting('footer copyright 2' . Yii::$app->language, true, 'Realizacja
                            <a
                                    class="Footer__link"
                                    target="_blank"
                                    href="https://www.vertesdesign.pl/"
                            >Vertes Desing</a>') ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
