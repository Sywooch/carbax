<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\classes\Custom_function;
use common\models\db\User;
use frontend\widgets\NumberUnreadMessages;
use frontend\widgets\SelectRequestTypes;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
//$ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name='yandex-verification' content='5d0717db3e178e2e' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter34422170 = new Ya.Metrika({
                        id:34422170,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/34422170" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>

<?php $this->beginBody() ?>

<header class="header">
    <?php
    if(Yii::$app->user->isGuest):
    ?>
    <div class="header__container">
        <div class="loginLinks">
            <?=Html::a('Регистрация', Url::to('/register'), ['class'=>'regHeaderLink']) ." | ". Html::a('Вход', Url::to('/login'), ['class'=>'regHeaderLink']);?>
        </div>
    </div>
    <?php
    else:
    ?>
    <div class="header__container">
        <a href="/" class="header--logo">
            <img src="<?= Url::base() ?>/media/img/smalllogo.png" alt="">
            <h5>Car<span class="orange">bax</span></h5>
        </a>
        <a href="<?=Url::to(['/profile/default/view'])?>" class="header--autotext"><?= User::getLogin(Yii::$app->user->id);?></a>
        <a href="<?=Url::to('/office')?>" class="header--perscab">Личный кабинет</a>
        <form action="#" class="header--region">
            <input type="text" class="header--region--box" placeholder="Город">
        </form>
        <a href="<?=Url::to(['/message'])?>" class="header--messages">Мои сообщения <?= NumberUnreadMessages::widget(); ?></a>
        <a href="#" class="header--sales"><span>Спецпредложения</span></a>
        <div class="header--request">
            <a href="#" class="header--request--open">ЗАЯВКА НА СЕРВИС +</a>
            <?= SelectRequestTypes::widget(['classNav'=>'head-nav','classUl'=>'head-nav__list']); ?>
            <!--<nav class="head-nav" role="navigation">
                <ul class="head-nav__list">
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
        <?=Html::a('', [Url::to('/logout')], ['class'=>'header--logout', 'data'=>['method' => 'post']]);?>
        <!--<a href="#" class="header--logout"></a>-->
    </div>
    <?php
    endif
    ?>
</header>
<section class="filter">
    <div class="wrap">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

</section>

<footer class="footer">
    <div class="contain">
        <div class="footer__logo">
            <div class="footer__logo-img">
                <img src="<?= Url::base() ?>/media/img/sedan4.png" alt="">
            </div>
            <div class="footer__logo-desc">
                <h1>CARBAX<span class="orange">.RU</span></h1>
                <p>ремонт и обслуживание авто</p>
            </div>
        </div>
        <div class="footer__nav">
            <ul class="footer__nav-autoteh"><span class="orange"><?= User::getLogin(Yii::$app->user->id);?></span>
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
