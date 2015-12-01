<?php
use common\models\db\Services;
use common\models\db\User;
use frontend\modules\flea_market\widgets\SimilarAds;
use frontend\widgets\FleaMarketSearch;

$this->registerJsFile('http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js');
$this->registerCssFile('http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css');

echo FleaMarketSearch::widget(['title'=>false]);?>
<div class="fleamarket__headProductTop">

    <div class="fleamarket__cat_city">
        Все объявления в Санкт-Петербурге  /  Транспорт  /  Запчасти и аксессуары  /  Запчасти  /  Для автомобилей  /  Стекла
    </div>
    <div class="fleamarket__views_product">
        Просмотров: <span><?=$product->views;?></span>
    </div>
</div>
<section class="fleamarket__wrap_view">
    <div class="contain_wr">
        <div class="fleamarket__head">
            <h1><?=$product->name;?></h1>
            <div class="fleamarket__created">Размещено <?=date('d.m.y в H:i:s',$product->dt_add);?></div>
            <span>
                <a href="#">Редактировать,</a> <a href="#">закрыть,</a> <a href="#">поднять</a> объявление</span>
        </div>
        <div class="fleamarket__slider">
            <div class="fotorama" data-nav="thumbs">
                <?php foreach ($images as $img) {
                    ?>
                    <img src="/<?=$img->img?>" alt="">
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="fleamarketInfoProduct">
           <div class="price">
               Цена
               <span><?=$product->price;?> руб.</span>
           </div>
            <?php
                if($product->service_id > 0){
            ?>
                <div class="fleamarket__company">
                    Компания
                    <span><?= Services::find()->where(['id'=>$product->service_id])->one()->name?> <!--<span class="fleamarket__onCarbax">на Carbax c 14 октября 2015</span>--></span>
                </div>
            <?php } ?>
            <div class="fleamarket__contact_person">
                Контактное лицо
                <span><?= User::find()->where(['id' => $product->user_id])->one()->username?></span>
                <div class="fleamarket__user_contact">
                    <span class="fleamarket__user_tel">Показать телефон</span>
                    <span class="fleamarket__user_mes">Написать сообщение</span>
                    <span class="info">Пожалуйста, скажите продавцу, что вы нашли это объявление на Carbax </span>
                </div>
            </div>
            <div class="fleamarket__city">
                Город <span><?= \common\models\db\GeobaseCity::find()->where(['id'=>$product->city_id])->one()->name;?></span>
            </div>
            <div class="fleamarket__type_product">
                Вид товара: <?=$category;?>
            </div>
            <div class="fleamarket_product_description">
                <?=$product->descr;?>
            </div>
            <div class="fleamarket__number_ads">
                Номер объявления:<?=$product->id;?>
            </div>

        </div>

    </div>
    <div class="fleamarket__footer">
        <a href="#" class="write_seller">Написать продавцу</a>
        <a href="#" class="favorites_products">В избранное</a>
        <a href="#" class="complain_products">Пожаловаться</a>
        <a href="#" class="share_products">Поделиться</a>
        <div class="fleamarket__socseti">
            <a href="#"><img src="/media/img/vk.png" alt=""></a>
            <a href="#"><img src="/media/img/ok.png" alt=""></a>
            <a href="#"><img src="/media/img/fb.png" alt=""></a>
            <a href="#"><img src="/media/img/gg.png" alt=""></a>
            <a href="#"><img src="/media/img/tw.png" alt=""></a>
            <a href="#"><img src="/media/img/mm.png" alt=""></a>
        </div>
    </div>
    <?= SimilarAds::widget(['id'=>$product->id,'catid'=>$product->category_id]);?>
</section>