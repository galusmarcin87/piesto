<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;

?>

<?=$this->render('/common/projects')?>

<?=$this->render('index/section1')?>

<?=$this->render('index/section2')?>

<?=$this->render('index/section3')?>

<?=$this->render('/common/movies')?>

<?=$this->render('/common/news')?>

<?=$this->render('index/team')?>
