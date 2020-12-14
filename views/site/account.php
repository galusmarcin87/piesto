<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\mgcms\db\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\Tabs;

$this->title = Yii::t('db', 'My account');
$this->params['breadcrumbs'][] = $this->title;


?>


<section class="Section Section--big-padding-top Contact animatedParent">
    <div class="container">
        <?
        $tabsItems = [
            [
                'label' => MgHelpers::getSettingTranslated('account_tab1', 'My investitions'),
                'content' => $this->render('account/tokens', [
                    'payments' => $model->payments
                ]),
                'options' => ['id' => 'myTokens'],
            ],
            [
                'label' => MgHelpers::getSettingTranslated('account_tab2', 'My data'),
                'content' => $this->render('account/data', [
                    'model' => $model
                ]),
                'options' => ['id' => 'myAccount'],
            ],
        ];

        echo Tabs::widget([
            'items' => $tabsItems,
            'linkOptions' => [
                'class' => 'btn btn-success'
            ]
        ]);

        ?>


    </div>
</section>