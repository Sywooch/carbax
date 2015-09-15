<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<!--<div class="wrap">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => 'My Company',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//        ['label' => 'About', 'url' => ['/site/about']],
//        ['label' => 'Contact', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Signup', 'url' => ['/register']];
//        $menuItems[] = ['label' => 'Login', 'url' => ['/login']];
//    } else {
//        $menuItems[] = [
//            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//            'url' => ['/logout'],
//            'linkOptions' => ['data-method' => 'post']
//        ];
//        $menuItems[] = [
//            'label' => 'Profile',
//            'url' => ['/profile'],
//            'linkOptions' => ['data-method' => 'post']
//        ];
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
//    ?>
<!---->
<!--    <div class="container">-->
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<!--        --><?//= Alert::widget() ?>
<!--        --><?//= $content ?>
<!--    </div>-->
<!--</div>-->

<header class="header">
    <div class="header__leftSide">
        <ul class="header__leftSide__menu">
            <a href="#nowhere">
                <li><i class="header__leftSide__menu__write"></i></li>
            </a>
            <a href="#nowhere">
                <li>AutoTech1</li>
            </a>
            <a href="#nowhere">
                <li><i class="header__leftSide__menu__squares"></i></li>
            </a>
            <a href="#nowhere">
                <li>Купить <i class="header__leftSide__menu__vip">Vip</i></li>
            </a>
        </ul>
    </div>
    <div class="header__rightSide">
        <ul class="header__rightSide__menu">
            <a href="#nowhere">
                <li><i class="header__rightSide__menu__mail"></i></li>
            </a>
            <a href="#nowhere">
                <li><i class="header__rightSide__menu__goods"></i>Товары <span>(1)</span></li>
            </a>
            <a href="#nowhere">
                <li><i class="header__rightSide__menu__stock"></i>Акции</li>
            </a>
            <a href="#nowhere">
                <li>Мои сервисы</li>
            </a>
            <a href="#nowhere">
                <li><i class="header__rightSide__menu__logout"></i></li>
            </a>
        </ul>
    </div>
</header>

<section class="first">
    <div class="first__title">
        <div class="first__title__logo">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/sedan4.png" alt="">
        </div>
        <div class="first__title__desc">
            <h1>CARBAX<span class="orange">.RU</span></h1>
            <p>ремонт и обслуживание авто</p>
        </div>
    </div>
    <div class="first__but">
        <a href="#nowhere">Заявка на ремонт</a>
        <a href="#nowhere">Заявка на запчасти</a>
    </div>
</section>

<section class="filter">
    <div class="filter__container">
        <h1 class="blockTitle orange">Фильтруйте поиск</h1>
        <a href="#nowhere" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/2.png" alt="">
            <p>Заправки</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/1.png" alt="">
            <p>Техосмотр</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/3.png" alt="">
            <p>Авторынок</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/4.png" alt="">
            <p>Автокарусель</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/5.png" alt="">
            <p>Заправки</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/6.png" alt="">
            <p>Техосмотр</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/7.png" alt="">
            <p>Авторынок</p>
        </a>
        <a href="#" class="filter__container__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/8.png" alt="">
            <p>Автокарусель</p>
        </a>
    </div>
</section>

<section class="whatIs">
    <div class="contain">
        <h1 class="blockTitle white">Что такое CarBax ?</h1>
        <div class="whatIs__block">
            <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis1.png" alt=""></div>
            <div class="whatIs__block-text">
                <h3>Поиск автосервисов</h3>
                <p>Мы размещаем на нашем сайте
                    только проверенные и качественные
                    сервисы</p>
            </div>
        </div>
        <div class="whatIs__block">
            <div class="whatIs__block-img "><img src="<?= \yii\helpers\Url::base() ?>/media/img/whatis2.png" alt=""></div>
            <div class="whatIs__block-text">
                <h3>Надежность</h3>
                <p>Тра-та-та, нужен копирайтер
                    он очень нужен, у меня мыслей нет</p>
            </div>
        </div>
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
</section>

<section class="deals">
    <h1 class="blockTitle magenta">Спецпредложения</h1>
    <div class="deals__line">
        <div class="deals__line__block">
            <div class="deals__line__block-img">
                <img src="<?= \yii\helpers\Url::base() ?>/media/img/car1.png" alt="">
            </div>
            <div class="deals__line__block-content">
                <a href="#nowhere"><h2 class="orange">Полный осмотр вашего автомобиля - 499 руб.</h2></a>
                <p>Компания  «ТехноАвто» приглашает вас поучаствовать в акции «Осмотр вашего авто - 499 руб.». Получите качественный осмотр за небольшие деньги! </p>
                <small class="magenta">«ТехноАвто»</small>
                <small>Срок акции 22.06.2015-22.08.2015</small>
                <div class="soc">
                    <a href="#nowhere"><i class="soc__vk"></i></a>
                    <a href="#nowhere"><i class="soc__fb"></i></a>
                    <a href="#nowhere"><i class="soc__tw"></i></a>
                    <a href="#nowhere"><i class="soc__lj"></i></a>
                    <a href="#nowhere"><i class="soc__ok"></i></a>
                    <a href="#nowhere"><i class="soc__gp"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="deals__line">
        <div class="deals__line__block">
            <div class="deals__line__block-img">
                <img src="<?= \yii\helpers\Url::base() ?>/media/img/car1.png" alt="">
            </div>
            <div class="deals__line__block-content">
                <a href="#nowhere"><h2 class="orange">Полный осмотр вашего автомобиля - 499 руб.</h2></a>
                <p>Компания  «ТехноАвто» приглашает вас поучаствовать в акции «Осмотр вашего авто - 499 руб.». Получите качественный осмотр за небольшие деньги! </p>
                <small class="magenta">«ТехноАвто»</small>
                <small>Срок акции 22.06.2015-22.08.2015</small>
                <div class="soc">
                    <a href="#nowhere"><i class="soc__vk"></i></a>
                    <a href="#nowhere"><i class="soc__fb"></i></a>
                    <a href="#nowhere"><i class="soc__tw"></i></a>
                    <a href="#nowhere"><i class="soc__lj"></i></a>
                    <a href="#nowhere"><i class="soc__ok"></i></a>
                    <a href="#nowhere"><i class="soc__gp"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="deals__line">
        <div class="deals__line__block">
            <div class="deals__line__block-img">
                <img src="<?= \yii\helpers\Url::base() ?>/media/img/car1.png" alt="">
            </div>
            <div class="deals__line__block-content">
                <a href="#nowhere"><h2 class="orange">Полный осмотр вашего автомобиля - 499 руб.</h2></a>
                <p>Компания  «ТехноАвто» приглашает вас поучаствовать в акции «Осмотр вашего авто - 499 руб.». Получите качественный осмотр за небольшие деньги! </p>
                <small class="magenta">«ТехноАвто»</small>
                <small>Срок акции 22.06.2015-22.08.2015</small>
                <div class="soc">
                    <a href="#nowhere"><i class="soc__vk"></i></a>
                    <a href="#nowhere"><i class="soc__fb"></i></a>
                    <a href="#nowhere"><i class="soc__tw"></i></a>
                    <a href="#nowhere"><i class="soc__lj"></i></a>
                    <a href="#nowhere"><i class="soc__ok"></i></a>
                    <a href="#nowhere"><i class="soc__gp"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="deals__line">
        <div class="deals__line__block">
            <div class="deals__line__block-img">
                <img src="<?= \yii\helpers\Url::base() ?>/media/img/car1.png" alt="">
            </div>
            <div class="deals__line__block-content">
                <a href="#nowhere"><h2 class="orange">Полный осмотр вашего автомобиля - 499 руб.</h2></a>
                <p>Компания  «ТехноАвто» приглашает вас поучаствовать в акции «Осмотр вашего авто - 499 руб.». Получите качественный осмотр за небольшие деньги! </p>
                <small class="magenta">«ТехноАвто»</small>
                <small>Срок акции 22.06.2015-22.08.2015</small>
                <div class="soc">
                    <a href="#nowhere"><i class="soc__vk"></i></a>
                    <a href="#nowhere"><i class="soc__fb"></i></a>
                    <a href="#nowhere"><i class="soc__tw"></i></a>
                    <a href="#nowhere"><i class="soc__lj"></i></a>
                    <a href="#nowhere"><i class="soc__ok"></i></a>
                    <a href="#nowhere"><i class="soc__gp"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news">
    <div class="contain">
        <h1 class="blockTitle orange">Новости из мира авто</h1>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img1.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img2.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img1.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
        <div class="news__block">
            <img src="<?= \yii\helpers\Url::base() ?>/media/img/img2.png" alt="">
            <small>Статьи  /  Автоправо</small>
            <a href="#nowhere" class="news__block-title">Как ГИБДД бойкотирует медсправки
                и что с этим делать</a>
            <a href="#nowhere" class="news__block-eye"><i></i>1102</a>
            <a href="#nowhere" class="news__block-comment"><i></i>1102</a>
        </div>
    </div>
</section>

<section class="map">
    <div id="map_canvas" style="width:100%; height:100%"></div>
</section>

<footer class="footer">
    <div class="contain">
        <div class="footer__logo">
            <div class="footer__logo-img">
                <img src="<?= \yii\helpers\Url::base() ?>/media/img/sedan4.png" alt="">
            </div>
            <div class="footer__logo-desc">
                <h1>CARBAX<span class="orange">.RU</span></h1>
                <p>ремонт и обслуживание авто</p>
            </div>
        </div>
        <div class="footer__nav">
            <ul class="footer__nav-autoteh"><span class="orange">TechAuto</span>
                <li><a href="#nowhere">Сообщения</a></li>
                <li><a href="#nowhere">Мой счет</a></li>
                <li><a href="#nowhere">Настройки</a></li>
                <li><a href="#nowhere">Выход</a></li>
            </ul>
            <ul class="footer__nav-about">
                <span>О проекте:</span>
                <li><a href="#nowhere">Правила сайта</a></li>
                <li><a href="#nowhere">Советы</a></li>
                <li><a href="#nowhere">Контакты</a></li>
                <li><a href="#nowhere">Реклама</a></li>
            </ul>
        </div>
        <div class="footer__contacts">
            <h3>8-<span class="orange">800</span>-234-21-12</h3>
            <h3>8-<span class="orange">495</span>-222-44-44</h3>
            <div class="soc">
                <a href="#nowhere"><i class="soc__vk-b"></i></a>
                <a href="#nowhere"><i class="soc__fb-b"></i></a>
                <a href="#nowhere"><i class="soc__tw-b"></i></a>
                <a href="#nowhere"><i class="soc__lj-b"></i></a>
                <a href="#nowhere"><i class="soc__ok-b"></i></a>
                <a href="#nowhere"><i class="soc__gp-b"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
