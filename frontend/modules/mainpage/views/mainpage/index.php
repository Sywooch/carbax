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
?>

<section class="first">
    <div class="first__title__desc">
        <h1><span>CARBAX<span class="orange">.RU</span></span></h1>
        <p>ремонт и обслуживание авто</p>
    </div>

    <div class="first__but">

        <!-- <a href="#nowhere">Заявка на ремонт</a> -->
        <a href="#nowhere" class="first__but--but" >Оформить заявку</a>
       <?= SelectRequestTypes::widget(['classNav'=>'first-nav','classUl'=>'first-nav__list']); ?>

        <!--<nav class="first-nav" role="navigation">
            <ul class="first-nav__list">
                <li><a href="#">Автосалон</a></li>
                <li><a href="#">Диски</a></li>
                <li><a href="#">Шиномонтаж</a></li>
                <li><a href="#">Автомойка</a></li>
                <li><a href="#">Страхование</a></li>
                <li><a href="#">Эвакуатор</a></li>
                <li><a href="#">Шины</a></li>
                <li><a href="#">Автосервис</a></li>
                <li><a href="#">Запчасти</a></li>
                <li><a href="#">Тюнинг</a></li>
            </ul>
        </nav>-->
    </div>

</section>

<!--<section class="filter">
    <div class="contain">
        <div class="filter__container">
            <h1 class="blockTitle">Фильтруйте поиск</h1>
            <aside class="filter__container--select">
                <div class="filter__container-select--check">
                    <input type="checkbox" value="None" id="filter_category_select_2" name="category[]"/>
                    <label for="filter_category_select_2">
                         <span>
                            <img src="/media/img/2.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_1" name="category[]"/>
                    <label for="filter_category_select_1">
                         <span>
                            <img src="/media/img/1.png" alt="" />
                            <p>Техосмотр</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_3" name="category[]"/>
                    <label for="filter_category_select_3">
                         <span>
                            <img src="/media/img/3.png" alt="" />
                            <p>Авторынок</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_4" name="category[]"/>
                    <label for="filter_category_select_4">
                         <span>
                            <img src="/media/img/4.png" alt="" />
                            <p>Автокарусель</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_5" name="category[]"/>
                    <label for="filter_category_select_5">
                         <span>
                            <img src="/media/img/5.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_6" name="category[]"/>
                    <label for="filter_category_select_6">
                         <span>
                            <img src="/media/img/6.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>

                    <input type="checkbox" value="None" id="filter_category_select_7" name="category[]"/>
                    <label for="filter_category_select_7">
                         <span>
                            <img src="/media/img/7.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_8" name="category[]"/>
                    <label for="filter_category_select_8">
                         <span>
                            <img src="/media/img/8.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>
                </div>
            </aside>
            <?/*= MainPageMap::widget()*/?>
            <div class="filter__container--map">
                <div class="filter__container--map--title">
                    <p>Результаты фильтра</p>
                </div>
                <div id="map_canvas" style="width:100%; height:100%"></div>
            </div>
        </div>
    </div>
</section>-->
<?= MainPageMap::widget() ?>
<?= FleaMarketSearch::widget() ?>
<?= FleaMarketNewProduct::widget(); ?>
<?= FleaMarketMostViewed::widget(); ?>
<!--<section class="filter">
<div class="contain">
<h2 class="blockTitle-left">Поиск - барахолка</h2>
<div class="filter__searchline">
    <form action="">
        <select name="" id="">
            <option selected disabled>Тип объявления</option>
            <option value="">Автомобили</option>
            <option value="">Автомобили</option>
        </select>
        <input type="text" class="filter__searchline--search" placeholder="Поиск по объявлениям">
        <select name="" id="">
            <option selected disabled>Запчасти и аксессуары</option>
            <option value="">Автомобили</option>
            <option value="">Автомобили</option>
        </select>
        <!--<select name="" id="">
            <option selected disabled>Автомобили</option>
            <option value="">Автомобили</option>
            <option value="">Автомобили</option>
        </select>
        <input type="submit" class="filter__searchline--but" value="Найти">
        <input type="button" class="filter__searchline--but" value="На карте">
    </form>
</div>-->
<!--<div class="filter__typesearch">
    <div class="filter__typesearch--box">
        <select name="" id="">
            <option selected disabled>Все</option>
            <option value="">Мотоциклы и мототехника</option>
            <option value="">Мотоциклы и мототехника</option>
        </select>
        <select name="" id="">
            <option selected disabled>Мотоциклы и мототехника</option>
            <option value="">Мотоциклы и мототехника</option>
            <option value="">Мотоциклы и мототехника</option>
        </select>
        <select name="" id="">
            <option selected disabled>Грузовики и спецтехника</option>
            <option value="">Мотоциклы и мототехника</option>
            <option value="">Мотоциклы и мототехника</option>
        </select>
        <select name="" id="">
            <option selected disabled>Водный транспорт</option>
            <option value="">Мотоциклы и мототехника</option>
            <option value="">Мотоциклы и мототехника</option>
        </select>
    </div>
</div>-->
</div>
</section>
<?= OffersWidgetFront::widget()?>
<?= NewsWidgetFront::widget()?>



<section class="whatIs">
    <div class="contain">
        <h1 class="blockTitle white">Что такое CarBax ?</h1>
        <div class="line">
            <div class="whatIs__block">
                <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis1.png" alt=""></div>
                <div class="whatIs__block-text">
                    <h3>Поиск автосервисов</h3>
                    <p>Поиск лучших предложение по Вашим запросам.</p>
                </div>
            </div>
            <div class="whatIs__block">
                <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis2.png" alt=""></div>
                <div class="whatIs__block-text">
                    <h3>Надежность</h3>
                    <p>Надежный партнер между Вами и автосервисом.</p>
                </div>
            </div>
        </div>
        <div class="line">
            <div class="whatIs__block">
                <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis3.png" alt=""></div>
                <div class="whatIs__block-text">
                    <h3>Система отзывов</h3>
                    <p>Отзывы о сервиса пишут только реальные
                        люди, соответственно легко выбрать
                        лучшего из лучших</p>
                </div>
            </div>
            <div class="whatIs__block">
                <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis4.png" alt=""></div>
                <div class="whatIs__block-text">
                    <h3>Удобство</h3>
                    <p>Вам не придется выходить из дома,
                        чтобы узнать цену, сроки и прочие услуги
                        сервиса. </p>
                </div>
            </div>
        </div>
    </div>
</section>
