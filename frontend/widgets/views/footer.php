<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer class="foot">
    <div class="contain">
        <div class="foot--logo">
            <img src="/media/img/carbax-logo.png" alt="">
            <h4>Все автоуслуги Вашего <span class="orange">города</span></h4>
            <span class="foot--city"><?= $address['city_name']; ?></span>
        </div>
        <div class="foot__sitemap">
            <ul>
                <li>
                    <a href="<?= Url::to('/office'); ?>" class="foot__sitemap--parent">Личный кабинет</a>
                </li>
                <li>
                    <a href="<?= Url::to('/garage'); ?>">Гараж</a>
                </li>
                <li>
                    <a href="<?= Url::to('/request_type'); ?>">Заявка</a>
                </li>
                <li>
                    <a href="<?= Url::to('/flea_market/default/add?type=auto'); ?>">Продать авто</a>
                </li>
                <li>
                    <a href="<?= Url::to('/flea_market/default/add?type=zap'); ?>">Продать запчасти</a>
                </li>
                <li>
                    <a href="<?= Url::to('/offers'); ?>">Спецпредложения</a>
                </li>
                <li>
                    <a href="<?= Url::to('/favorites'); ?>">Избранное</a>
                </li>
            </ul>

            <ul>
                <li>
                    <?= Html::a('Барахолка',['/flea_market/search'],['class'=>'foot__sitemap--parent']); ?>
                    <!--<a href="#" class="foot__sitemap--parent">Барахолка</a>-->
                </li>
                <li>
                    <?= Html::a('Мототехника',['/flea_market/search','prod_type'=>'2','typeAuto'=>'3']); ?>
                    <!--<a href="#"></a>-->
                </li>
                <li>
                    <?= Html::a('Легковые авто',['/flea_market/search','prod_type'=>'2','typeAuto'=>'1']); ?>
                    <!--<a href="#">Легковые авто</a>-->
                </li>
                <li>
                    <?= Html::a('Грузовые авто',['/flea_market/search','prod_type'=>'2','typeAuto'=>'2']); ?>
                   <!-- <a href="#">Грузовые авто</a>-->
                </li>
                <li>
                    <?= Html::a('Шины',['/flea_market/search','prod_type'=>'3']); ?>
                    <!--<a href="#">Спецтехника</a>-->
                </li>
                <li>
                    <?= Html::a('Диски',['/flea_market/search','prod_type'=>'4']); ?>
                    <!--<a href="#">Запчасти</a>-->
                </li>
            </ul>

            <ul>
                <li>
                    <?= Html::a('Запросы',['/request_type'],['class'=>'foot__sitemap--parent']); ?>
                </li>
                <li>
                    <?= Html::a('Автошкола',['/request','id'=>'11']); ?>
                </li>
                <li>
                    <?= Html::a('Шиномонтаж',['/request','id'=>'1']); ?>
                </li>
                <li>
                    <?= Html::a('Автосалон',['/request','id'=>'12']); ?>
                </li>
                <li>
                    <?= Html::a('Шины',['/request','id'=>'6']); ?>
                </li>
                <li>
                    <?= Html::a('Мойка',['/request','id'=>'2']); ?>
                </li>
                <li>
                    <?= Html::a('Тюнинг',['/request','id'=>'8']); ?>
                </li>
                <li>
                    <?= Html::a('Запчасти',['/request','id'=>'9']); ?>
                </li>
            </ul>

            <ul>
                <li>
                    <?= Html::a('Спецпредложения',['/offers/offers/all_offers','id'=>0],['class'=>'foot__sitemap--parent']); ?>
                <li>
                    <?= Html::a('Автосалон',['/offers/offers/all_offers','id'=>'1']); ?>
                </li>
                <li>
                    <?= Html::a('Шиномонтаж',['/offers/offers/all_offers','id'=>'2']); ?>
                </li>
                <li>
                    <?= Html::a('Шины/Диски',['/offers/offers/all_offers','id'=>'4']); ?>
                </li>
                <li>
                    <?= Html::a('Тюнинг',['/offers/offers/all_offers','id'=>'6']); ?>
                </li>
                <li>
                    <?= Html::a('Автомойка',['/offers/offers/all_offers','id'=>'10']); ?>
                </li>
                <li>
                    <?= Html::a('Автосервис',['/offers/offers/all_offers','id'=>'11']); ?>
                </li>
                <li>
                    <?= Html::a('Автомагазин',['/offers/offers/all_offers','id'=>'12']); ?>
                </li>
            </ul>
        </div>
        <div class="foot__sitemap--right">
            <ul>
                <li>
                    <a href="<?= Url::to('news'); ?>" class="foot__sitemap--parent">Новости</a>
                </li>

                <?php foreach($catNews as $cat):?>
                    <li>
                        <a href="<?= Url::to(['/news/news/all_news_cat','id'=>$cat->id])?>"><?= $cat->name; ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
            <ul>
                <li>
                    <a href="<?= Url::to(['/static_pages','id'=>'1']);?>" class="foot__sitemap--parent">Автопортал</a></li>
                <li>
                    <a href="<?= Url::to(['/static_pages','id'=>'1']);?>">О нас</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/static_pages','id'=>'2']);?>">Правила сайта</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/static_pages','id'=>'3']);?>">Реклама </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/static_pages','id'=>'4']);?>">Контакты</a>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?= Url::to('/office');?>" class="foot__sitemap--parent">Управление бизнесом</a></li>
                <li>
                    <a href="<?= Url::to('/office');?>">Личный кабинет</a>
                </li>
                <li>
                    <a href="<?= Url::to('/select_service');?>">Мой бизнес</a>
                </li>
                <li>
                    <a href="<?= Url::to('/offers/create');?>">Создать спецпредложение</a>
                </li>
            </ul>
            <div class="foot--social">
                <a href="#nowhere"><i class="fa fa-vk"></i></a>
                <a href="#nowhere"><i class="fa fa-facebook"></i></a>
                <a href="#nowhere"><i class="fa fa-twitter"></i></a>
                <a href="#nowhere"><img src="/media/img/lj.png" alt=""></a>
                <a href="#nowhere"><i class="fa fa-odnoklassniki"></i></a>
                <a href="#nowhere"><i class="fa fa-google-plus"></i></a>
            </div>
            <!--<div class="foot--social--logo">
                <img src="/media/img/carbax-logo.png" alt="">
            </div>-->
        </div>
    </div>
</footer>
