<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);
$menu2 = new NobleMenu(['name' => 'footer2_' . Yii::$app->language, 'loginLink' => false]);

?>

<div class="Scroll-up">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</div>
<footer>
    <div class="Footer animatedParent">
        <div class="container fadeIn animated">
            <div class="Footer__header"><?= Yii::t('db', 'Contact with us'); ?></div>
            <div class="Footer__top">
                <div class="row">
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Phone'); ?>
                        <? $phone = MgHelpers::getSetting('footer phone', false, '+22 900 121 212') ?>
                        <a class="Footer__top__desc" href="tel:<?= str_replace(' ', '', $phone) ?>">
                            <?= $phone ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Email'); ?>
                        <? $email = MgHelpers::getSetting('footer email', false, 'biuro@piesto.io') ?>
                        <a class="Footer__top__desc" href="mailto:<?= $email ?>">
                            <?= $email ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Address'); ?>
                        <div class="Footer__top__desc">
                            <?= MgHelpers::getSetting('footer address', false, 'Marszałkowska 126/134 <br/>
                            00-008 Warszawa') ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Social media'); ?>
                        <div class="Footer__top__desc">
                            <div class="Social-icons">
                                <? if (MgHelpers::getSetting('facebook url')): ?>
                                    <a href="<?= MgHelpers::getSetting('facebook url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('youtube url')): ?>
                                    <a href="<?= MgHelpers::getSetting('youtube url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-youtube" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('twitter url')): ?>
                                    <a href="<?= MgHelpers::getSetting('twitter url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('linkedin url')): ?>
                                    <a href="<?= MgHelpers::getSetting('linkedin url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('instagram url')): ?>
                                    <a href="<?= MgHelpers::getSetting('instagram url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <img
                                                class="Social-icons__icon__img"
                                                src="/svg/instagram.svg"
                                                alt=""
                                        />
                                    </a>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="animatedParent">
                <div class="row">
                    <div class="col-md-3">
                        <div class="Footer__item"><?= Yii::t('db', 'About us'); ?></div>
                        <div class="Footer__desc">
                            <?= MgHelpers::getSetting('footer about us text' . Yii::$app->language, false, 'footer about us text') ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="Footer__item"><?= MgHelpers::getSetting('footer menu 1 header ' . Yii::$app->language, false, 'Menu') ?></div>
                        <ul class="Footer__menu fadeIn animated">
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
                    <div class="col-md-3 col-sm-6">
                        <div class="Footer__item">
                            Menu
                            <ul class="Footer__menu fadeIn animated">
                                <li class="Footer__menu__item">
                                    <a
                                            class="Footer__menu__link"
                                            href="./logowanie_rejestracja.html"
                                    >Logowanie</a
                                    >
                                </li>
                                <li class="Footer__menu__item">
                                    <a
                                            class="Footer__menu__link"
                                            href="./logowanie_rejestracja.html"
                                    >Rejestracja</a
                                    >
                                </li>
                                <li class="Footer__menu__item">
                                    <a class="Footer__menu__link" href=""
                                    >Polityka prywatności</a
                                    >
                                </li>
                                <li class="Footer__menu__item">
                                    <a class="Footer__menu__link" href="">Aktualności</a>
                                </li>
                                <li class="Footer__menu__item">
                                    <a class="Footer__menu__link" href="./kontakt.html"
                                    >Nasz zespół</a
                                    >
                                </li>
                                <li class="Footer__menu__item">
                                    <a class="Footer__menu__link" href="">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="Footer__item">
                            Sygnalizator inwestora
                            <div class="Newsletter animatedParent">
                                <br/>
                                Zapisz się i bądź na bieżąco
                                <form class="fadeIn animated" method="POST">
                                    <div class="Newsletter__inner">
                                        <div class="Form__group form-group">
                                            <input
                                                    class="Form__input form-control"
                                                    placeholder="&nbsp;"
                                                    id="phone"
                                                    name="phone"
                                                    type="phone"
                                                    required
                                            />
                                            <label class="Form__label">Twój e-mail</label>
                                        </div>
                                    </div>
                                    <input
                                            class="btn btn-success lowercase Newsletter__button"
                                            type="submit"
                                            value="Zapisz się"
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="animatedParent Footer__bottom">
                <div class="fadeIn animated">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&#169; 2020 Wszelkie prawa zastrzeżone - Piesto.io Sp. z o.o.</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


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
