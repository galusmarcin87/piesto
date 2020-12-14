<?

use app\components\mgcms\MgHelpers;

if (MgHelpers::getSetting('home - wspolpracujemy obrazki') == '') {
    return false;
}

?>

<h3 class="Header-icon">
    <?= Yii::t('db', 'Partners'); ?>
    <img class="Header-icon__icon" src="/svg/znaczek.svg" alt="" />
</h3>
<div class="Partners__carousel owl-carousel">

    <? foreach (MgHelpers::getSettingsArray('home - wspolpracujemy obrazki',false) as $fileUrl): ?>
        <div class="item Partners__item">
            <a class="Partners__item__link" href="#">
                <img src="<?=$fileUrl?>"/>
            </a>
        </div>
    <? endforeach; ?>


</div>
<div class="Custom-nav Custom-nav--color-black Partners__nav"></div>


