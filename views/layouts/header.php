<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use \app\components\mgcms\MgHelpers;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$isHomePage = $this->context->id == 'site' && $this->context->action->id == 'index';

$menu = new NobleMenu(['name' => 'header_' . Yii::$app->language, 'loginLink' => false]);

?>


<div class="Menu-top-wrapper">
    <div id="nav-container" class="Menu-top">
        <div class="Menu-top__inner">
            <div>
                <a href="/">
                    <img class="Menu-top__logo" src="/svg/logo.svg" alt="" />
                </a>
            </div>
            <ul class="Menu-top__list">
                <? foreach ($menu->getItems() as $item): ?>
                    <li class="<? if (isset($item['active']) && $item['active']): ?>menu__item--current<? endif ?>">
                        <? if (isset($item['url'])): ?>
                            <a href="<?= \yii\helpers\Url::to($item['url']) ?>"
                               class="
                                   Menu-top__link
                                   <? if (!$isHomePage || !preg_match('/.*#.*/', $item['url'])): ?>external<? endif ?>
                                   <? if (isset($item['active']) && $item['active']): ?>Menu-top__link--active<? endif ?>
                                "><?= $item['label'] ?></a>
                        <? endif ?>
                    </li>
                <? endforeach ?>

            </ul>
            <div class="Menu-top__action-block">
                <a href="<?= MgHelpers::getSetting('header buy tokens url') ?>" class="Menu-top__btn btn btn-primary"><?= Yii::t('db', 'Buy tokens'); ?></a>
                <div class="btn__rounded">
                    <img class="Menu-top__svg" src="/svg/login.svg" alt="" />
                    <i
                            class="Menu-top__chevron fa fa-chevron-down"
                            aria-hidden="true"
                    ></i>
                    <div class="Menu-top__dropdown">
                        <? if (Yii::$app->user->isGuest): ?>
                            <a href="<?= yii\helpers\Url::to(['/site/login']) ?>" class="btn btn-default"> <?= Yii::t('db', 'Login'); ?> </a>
                        <? else: ?>
                            <a href="<?= yii\helpers\Url::to(['/site/account']) ?>" class="btn btn-default"> <?= Yii::t('db', 'My account'); ?> </a>
                            <a href="javascript:submitLogoutForm()" class="btn btn-default"> <?= Yii::t('db', 'Log out'); ?> </a>
                        <? endif; ?>
                    </div>
                </div>
                <? if (MgHelpers::getSetting('facebook url')): ?>
                    <a  href="<?= MgHelpers::getSetting('facebook url') ?>" target="_blank">
                        <i class="Menu-top__icon fa fa-facebook" aria-hidden="true"></i>
                    </a>
                <? endif ?>
                <? if (MgHelpers::getSetting('youtube url')): ?>
                    <a  href="<?= MgHelpers::getSetting('youtube url') ?>" target="_blank">
                        <i class="Menu-top__icon fa fa-youtube" aria-hidden="true"></i>
                    </a>
                <? endif ?>
                <? if (MgHelpers::getSetting('twitter url')): ?>
                    <a href="<?= MgHelpers::getSetting('twitter url') ?>" target="_blank">
                        <i class="Menu-top__icon fa fa-twitter" aria-hidden="true"></i>
                    </a>
                <? endif ?>
                <? if (MgHelpers::getSetting('linkedin url')): ?>
                    <a href="<?= MgHelpers::getSetting('linkedin url') ?>" target="_blank">
                        <i class="Menu-top__icon fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                <? endif ?>
                <? if (MgHelpers::getSetting('instagram url')): ?>
                    <a href="<?= MgHelpers::getSetting('instagram url') ?>" target="_blank">
                        <i class="Menu-top__icon fa fa-instagram" aria-hidden="true"></i>
                    </a>
                <? endif ?>

                <div class="Select-custom whiteBg">
                    <div class="btn__rounded"><?= strtoupper(Yii::$app->language) ?></div>
                    <div class="Select-custom__options">
                        <? foreach (Yii::$app->params['languagesDisplay'] as $language) : ?>
                            <div class="Select-custom__options__option" data-value="<?= $language ?>">
                                <a href="<?= yii\helpers\Url::to(['/', 'language' => $language]) ?>"
                                   class="Select-custom__options__option"><?= strtoupper($language) ?></a>
                            </div>
                        <? endforeach ?>
                    </div>
                </div>

                <a href="#" class="Menu-top__toggle-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>

            </div>
        </div>
    </div>
</div>


<?= Html::beginForm(['/site/logout'], 'post', ['id' => 'logoutForm']) ?>
<?= Html::endForm() ?>
<script type="text/javascript">
    function submitLogoutForm() {
        $('#logoutForm').submit();
    }
</script>
