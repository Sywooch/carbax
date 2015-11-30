<?php
use frontend\widgets\FleaMarketSearch;


echo FleaMarketSearch::widget(['title'=>false]);?>
<div class="fleamarket__headProductTop">

    <div class="fleamarket__cat_city">
        Все объявления в Санкт-Петербурге  /  Транспорт  /  Запчасти и аксессуары  /  Запчасти  /  Для автомобилей  /  Стекла
    </div>
    <div class="fleamarket__views_product">
        Просмотров: <span>всего 780, сегодня 25</span>
    </div>
</div>
<section class="fleamarket__wrap_view">
    <div class="contain_wr">
        <div class="fleamarket__head">
            <h1>Land Rover Range Rover, 2006</h1>
            <div class="fleamarket__created">Размещено сегодня в 11:51</div>
            <span>Редактировать, закрыть, поднять объявление</span>
        </div>
        <div class="fleamarket__slider">

        </div>
        <div class="fleamarketInfoProduct">
           <div class="price">
               Цена
               <span>13300 руб.</span>
           </div>

            <div class="fleamarket__company">
                Компания
                <span>Мир автостекла <span class="fleamarket__onCarbax">на Carbax c 14 октября 2015</span></span>
            </div>
            <div class="fleamarket__contact_person">
                Контактное лицо
                <span>Константин</span>
                <div class="fleamarket__user_contact">
                    <span class="fleamarket__user_tel">Показать телефон</span>
                    <span class="fleamarket__user_mes">Написать сообщение</span>
                    <span class="info">Пожалуйста, скажите продавцу, что вы нашли это объявление на Carbax </span>
                </div>
            </div>
            <div class="fleamarket__city">
                Город <span>Москва</span>
            </div>
            <div class="fleamarket__type_product">
                Вид товара: Запчасти / Для автомобилей / Стекла
            </div>
            <div class="fleamarket_product_description">
                Профессиональный установочный центр предлагает услуги по замене автостёкол. Лобовое стекло, боковое, заднее стекло с заменой сегодня! Тонировка. В наличии и на заказ автостекла практически на любой автомобиль, доставка по городу бесплатно.
                Так же продажа и установка стёкол на спецтехнику
                Работает выездная бригада.
            </div>
            <div class="fleamarket__number_ads">
                Номер объявления: 6398547
            </div>

        </div>

    <?php
        \common\classes\Debug::prn($product);
    ?>
    </div>
</section>