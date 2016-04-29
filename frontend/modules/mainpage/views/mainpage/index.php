<?php
/* @var $this yii\web\View */
use frontend\modules\mainpage\widgets\MainPageMap;
use frontend\modules\news\widgets\NewsWidgetFront;
use frontend\modules\offers\widgets\OffersWidgetFront;
use frontend\widgets\FleaMarketMostViewed;
use frontend\widgets\FleaMarketNewProduct;
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\SelectRequestTypes;
$this->title = "Автопортал";
$this->registerMetaTag([
    'name' => 'description',
    'content' => $seo->meta_description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $seo->meta_keywords,
]);
?>

<section class="initial-screen">
    <div class="contain">

        <div class="initial-screen--center">
            <div class="initial-screen--logo">
                <a href="#" class="show_video" data-target="#video"><img src="/media/img/carbax-logo.png" alt=""></a>
                <h4>Все автоуслуги Вашего <span class="orange">города</span></h4>
            </div>
            <a href="#" class="initial-screen--apply first__but--but">Подать заявку</a>
            <?= SelectRequestTypes::widget(['classNav'=>'first-nav','classUl'=>'first-nav__list']); ?>
        </div>
    </div>
</section>




<?= MainPageMap::widget() ?>
<?= FleaMarketSearch::widget() ?>
<?= FleaMarketNewProduct::widget(); ?>
<?= FleaMarketMostViewed::widget(); ?>


<?= OffersWidgetFront::widget()?>
<?= NewsWidgetFront::widget()?>

<div class="modal fade" id="video" >
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Что такое <span class="orange">Carbax.ru</span></h4>
            </div>
            <div class="modal-body">
                ...
            </div>

        </div>
    </div>
</div>


