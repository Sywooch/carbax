<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\CityAutoComplete;
use frontend\widgets\CommercBanners;
use frontend\widgets\NumberUnreadMessages;
use frontend\widgets\SelectRequestTypes;
use frontend\widgets\ShowFooter;
use frontend\widgets\TogglePrivateOfficeLeft;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\db\User;
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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71827016-1', 'auto');
        ga('send', 'pageview');

    </script>
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
            <a href="/" class="header--logo" title="Главная Carbax">
                <img src="<?= Url::base() ?>/media/img/carbax-logo.png" alt="Carbax.ru">
                <!--<h5>Car<span class="orange">bax</span></h5>-->
            </a>
            <form action="<?=$_SERVER['REQUEST_URI']?>" class="header--region" id="auto_complete_form" method="post">
                <?= CityAutoComplete::widget(); ?>
                <?= \frontend\widgets\GetGeoInfo::widget(); ?>
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken(); ?>">
                <!--<input type="text" class="header--region--box" placeholder="Город">-->
            </form>


            <div class="loginLinks">
                <?=Html::a('Регистрация', Url::to('/register'), ['class'=>'regHeaderLink','title' => 'Регистрация на автопортале Carbax']) ." | ". Html::a('Вход', Url::to('/login'), ['class'=>'regHeaderLink','title' => 'Вход на автопортал Carbax']);?>
            </div>
        </div>
        <?php
    else:
    ?>
    <div class="header__container">
        <a href="/" class="header--logo" title="Главная Carbax">
            <img src="<?= Url::base() ?>/media/img/carbax-logo.png" alt="Carbax.ru">
            <!--<h5>Car<span class="orange">bax</span></h5>-->
        </a>
        <a href="<?=Url::to(['/profile/default/view'])?>" title="Профиль <?= User::getLogin(Yii::$app->user->id);?>" class="header--autotext"><?/*= User::getLogin(Yii::$app->user->id);*/?></a>
        <a href="<?=Url::to('/office')?>" title="Личный кабинет" class="header--perscab">Личный кабинет</a>

        <form action="<?=$_SERVER['REQUEST_URI']?>" class="header--region" id="auto_complete_form" method="post">
            <?= CityAutoComplete::widget(); ?>
            <?= \frontend\widgets\GetGeoInfo::widget(); ?>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken(); ?>">
            <!--<input type="text" class="header--region--box" placeholder="Город">-->
        </form>
        <a href="<?=Url::to(['/message'])?>" title="Мои сообщения" class="header--messages">Мои сообщения <?= NumberUnreadMessages::widget(); ?></a>
        <a href="<?=Url::to(['/offers/offers/index']);?>" title="Спецпредложения" class="header--sales"><span>Спецпредложения</span></a>
        <div class="header--request">
            <a href="#" class="header--request--open" title="Оставить заявку на сервис">ЗАЯВКА НА СЕРВИС +</a>
            <?= SelectRequestTypes::widget(['classNav'=>'head-nav','classUl'=>'head-nav__list']); ?>
        </div>
        <?=Html::a('', [Url::to('/logout')], ['class'=>'header--logout', 'title'=>'Выйти', 'data'=>['method' => 'post']]);?>
        <!--<a href="<?/*=Url::to('/logout')*/?>" class="header--logout"></a>-->
    </div>
        <?php
    endif
    ?>
</header>
<section class="singleImg"></section>
<section class="single_wrapper">
    <div class="contain">
        <div id="breadcrumb">
            <?=
            Breadcrumbs::widget([
                'homeLink' => [
                    'label' => "",
                    'url' => Yii::$app->homeUrl,
                    'template' => "<li><a href='/'><img src='/media/img/logo2.png'></a></li>",
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>

           <?php if(!Yii::$app->user->isGuest):?>
            <div class="logo">
                <a href="#" class="menu-open-flag"><span class="menu-icon__lines"></span></a>
                <nav class="side-nav" role="navigation">
                    <ul class="side-nav__list">
                        <!-- <li><a href="">Изменить пароль</a></li>
                         <li><a href="#">Изменить e-mail</a></li>-->
                        <li><a href="/profile/default/edit_contacts">Изменить личные данные</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['/message'])?>">Сообщения</a></li>
                        <li><a href="#">Купить <i class="header__leftSide__menu__vip">Vip</i></a></li>
                        <li><a href="#">Разместить акцию</a></li>
                        <li><a href="#">Разместить рекламу</a></li>
                        <li><a href="#">История покупок</a></li>
                        <li><a href="/complaint">Мои жалобы</a></li>
                    </ul>
                </nav>
            </div>
            <?php endif; ?>

        </div>
        <?= Alert::widget() ?>
        <?= TogglePrivateOfficeLeft::widget(['print'=>$this->params['officeHide']]); ?>
        <?= $content ?>
        <?= CommercBanners::widget(['print'=>$this->params['bannersHide']]); ?>
    </div>
</section>

<!-- ___________________ФУТЕР_______________________ -->
<?= ShowFooter::widget(); ?>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
