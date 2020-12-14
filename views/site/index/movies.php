<?

use app\models\mgcms\db\Project;
use app\components\mgcms\MgHelpers;

if (MgHelpers::getSetting('home - filmy youtube') == '') {
    return false;
}

?>


<section class="Section Section--transparent Video">
    <div class="container">
        <h3 class="Header-icon">
            Filmy
            <img class="Header-icon__icon" src="/svg/znaczek.svg" alt=""/>
        </h3>
        <p class="text-center">Obejrzyj filmy prezentujące inwestycje</p>
        <div class="Carousel">
            <div class="owl-carousel owl-theme animatedParent">
                <? foreach (MgHelpers::getSettingsArray('home - filmy youtube',false) as $ytUrl): ?>
                    <div class="Video__card fadeIn animated item">
                        <iframe
                                width="750"
                                height="420"
                                src="<?=$ytUrl?>"
                                frameborder="0"
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                        ></iframe>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <div class="Custom-nav Video__nav"></div>
    </div>
</section>
