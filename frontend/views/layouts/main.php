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

<div class="wrap">
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

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

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
