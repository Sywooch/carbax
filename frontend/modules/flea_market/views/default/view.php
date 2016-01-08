<?php
use common\models\db\GeobaseCity;
use common\models\db\Services;
use common\models\db\User;
use frontend\modules\flea_market\widgets\SimilarAds;
use frontend\widgets\FleaMarketSearch;
use yii\helpers\Html;

$this->registerJsFile('http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js');
$this->registerCssFile('http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css');
$this->title = $product->name;
//echo FleaMarketSearch::widget(['title'=>false]);?>
<div class="fleamarket__headProductTop">

    <div class="fleamarket__cat_city">
        Все объявления в <?= Html::a($city->name,['search','region'=>$product->region_id,'citySearch'=>$product->city_id,'search'=>''])?> /
        <?php if($product->prod_type == 1):?>
            <?= Html::a('Транспорт',['search','region'=>$product->region_id,'citySearch'=>$product->city_id,'search'=>'','prod_type'=>2]) ?>
        <?php else: ?>
            <?= Html::a('Запчасти',['search','region'=>$product->region_id,'citySearch'=>$product->city_id,'search'=>'','prod_type'=>1]); ?>
        <?php endif;?>

    </div>
    <div class="fleamarket__views_product">
        Просмотров: <span><?=$product->views;?></span>
    </div>
</div>
<section class="fleamarket__wrap_view">
    <div class="contain_wr">
        <div class="fleamarket__head">
            <h1><?=$product->name;?><span> (<?= $auto->brand_name; ?>, <?=$auto->model_name; ?>)</span></h1>
            <div class="fleamarket__created">Размещено <?=date('d.m.y в H:i:s',$product->dt_add);?></div>
            <?php if($product->user_id == Yii::$app->user->id): ?>
                <span class="operationsAd">
                    <a href="/flea_market/default/edit_product?id=<?=$product->id;?>">Редактировать,</a> <a href="#">закрыть,</a> <a href="#">поднять</a> объявление
                </span>
            <?php endif; ?>
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
                    <span class="fleamarket__user_tel" user-id="<?=$product->user_id;?>">Показать телефон</span>
                    <a href="/message/default/send_message?from=<?=$product->user_id;?>"><span class="fleamarket__user_mes">Написать сообщение</span></a>
                    <span class="info">Пожалуйста, скажите продавцу, что вы нашли это объявление на Carbax </span>
                </div>
            </div>
            <div class="fleamarket__city">
                Город <span><?= $city->name?></span>
            </div>
            <?php
            if($product->category_id != '0'):
            ?>
                <div class="fleamarket__type_product">
                    Вид товара: <?=$category;?>
                </div>
            <?php endif; ?>
            <div class="fleamarket_product_description">
                <?=$product->descr;?>
            </div>
            <div class="fleaMarketInfoProductAuto">
                <span>Марка: <?= $auto->brand_name; ?></span><br />
                <span>Модель: <?=$auto->model_name; ?></span><br />
                <span>Модификация:  <?=$auto->type_name; ?></span><br />
                <?php if(!empty($auto->year)):?>
                    <span>Год выпуска: <?=$auto->year;?></span>
                <?php endif; ?>

            </div>

            <div class="fleamarket__number_ads">
                Номер объявления:<?=$product->id;?>
            </div>

        </div>

    </div>
    <div class="fleamarket__footer">
        <a href="/message/default/send_message?from=<?=$product->user_id;?>" class="write_seller">Написать продавцу</a>
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