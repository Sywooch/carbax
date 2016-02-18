<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer class="foot">
    <div class="contain">
        <div class="foot--logo">
            <img src="/media/img/carbax-logo.png" alt="">
            <h4>Все автоуслуги Вашего <span class="orange">города</span></h4>
            <a href="#" class="foot--city">Москва</a>
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
                    <?= Html::a('Запросы',['/request_type'],['foot__sitemap--parent']); ?>
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
                    <?= Html::a('Мойка',['/request','id'=>'8']); ?>
                </li>
                <li>
                    <?= Html::a('Запчасти',['/request','id'=>'9']); ?>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="#" class="foot__sitemap--parent">Спецпредложения</a></li>
                <li>
                    <a href="#">Автосалон</a>
                </li>
                <li>
                    <a href="#">Шиномонтаж</a>
                </li>
                <li>
                    <a href="#">Шины/Диски</a>
                </li>
                <li>
                    <a href="#">Тюнинг</a>
                </li>
                <li>
                    <a href="#">Автомойка</a>
                </li>
                <li>
                    <a href="#">Автосервис</a>
                </li>
                <li>
                    <a href="#">Автомагазин</a>
                </li>
            </ul>
        </div>
        <div class="foot__sitemap--right">
            <ul>
                <li>
                    <a href="<?= Url::to('news'); ?>" class="foot__sitemap--parent">Новости</a>
                </li>
                <li>
                    <a href="#">Обо всем</a>
                </li>
                <li>
                    <a href="#">По маркам</a>
                </li>
                <li>
                    <a href="#">По моделям</a>
                </li>
                <li>
                    <a href="#">#мойcarbax</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" class="foot__sitemap--parent">Автопортал</a></li>
                <li>
                    <a href="#">О нас</a>
                </li>
                <li>
                    <a href="#">Правила сайта</a>
                </li>
                <li>
                    <a href="#">Реклама </a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="#" class="foot__sitemap--parent">Управление бизнесом</a></li>
                <li>
                    <a href="#">Личный кабинет</a>
                </li>
                <li>
                    <a href="#">Мой бизнес</a>
                </li>
                <li>
                    <a href="#">Создать спецпредложение</a>
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
