<?php
use frontend\widgets\CityAutoComplete;
?>

<header class="header">
    <!-- open .header_leftside -->
    <!-- open .header__logo -->
    <div class="header__logo">
        <a href="/">
            <img src="/theme/carbax/img/carbax-logo.png" alt="carbax logo" />
        </a>
    </div>
    <!-- close .header__logo -->
    <!-- open .header__location -->
    <div class="header__location">
        <form action="#" class="header--region" id="auto_complete_form" method="post">
            <a href="#" class="header__location_current myLocationCarbax myLocationCarbaxAutoComplite">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 434.174 434.174">
                    <g>
                        <path d="M217.087 119.397c-24.813 0-45 20.187-45 45s20.187 45 45 45 45-20.187 45-45-20.186-45-45-45z"/>
                        <path d="M217.087 0c-91.874 0-166.62 74.745-166.62 166.62 0 38.93 13.42 74.78 35.878 103.176l130.742 164.378L347.83 269.796c22.456-28.396 35.877-64.247 35.877-103.177C383.707 74.744 308.96 0 217.087 0zm0 239.397c-41.355 0-75-33.645-75-75s33.645-75 75-75 75 33.645 75 75-33.644 75-75 75z"/>
                    </g>
                </svg>
            </a>

            <?= CityAutoComplete::widget(); ?>
            <?= \frontend\widgets\GetGeoInfo::widget(); ?>
        </form>
        <!--<input type="text" class="header__location_field" placeholder="Бронницы" />-->
    </div>
    <!-- close .header__location -->

    <!-- open .header_rightside -->
    <div class="header_rightside">
        <a href="#" class="header__request">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 489.888 489.888">
                <path d="M25.383 290.5c-7.2-77.5 25.9-147.7 80.8-192.3 21.4-17.4 53.4-2.5 53.4 25 0 10.1-4.8 19.4-12.6 25.7-38.9 31.7-62.3 81.7-56.6 136.9 7.4 71.9 65 130.1 136.8 138.1 93.7 10.5 173.3-62.9 173.3-154.5 0-48.6-22.5-92.1-57.6-120.6-7.8-6.3-12.5-15.6-12.5-25.6 0-27.2 31.5-42.6 52.7-25.6 50.2 40.5 82.4 102.4 82.4 171.8 0 126.9-107.8 229.2-236.7 219.9-106.6-7.5-193.5-92.4-203.4-198.8zM244.883 0c-18 0-32.5 14.6-32.5 32.5v149.7c0 18 14.6 32.5 32.5 32.5s32.5-14.6 32.5-32.5V32.5c0-17.9-14.5-32.5-32.5-32.5z"/>
            </svg>
            ЗАЯВКА НА СЕРВИС
        </a>
        <?php if(Yii::$app->user->isGuest): ?>
            <a href="<?= \yii\helpers\Url::to('/register'); ?>" class="btn btn_orange header__registration">РЕГИСТАРАЦИЯ</a>
            <a href="<?= \yii\helpers\Url::to('/login'); ?>" class="header__signin">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-41 230.5 512 380.7">
                    <g id="XMLID_2_">
                        <path id="XMLID_4_" d="M391.5 397.6H121.9c-12.9 0-23.3 10.4-23.3 23.3s10.4 23.3 23.3 23.3h269.6l-30.1 30.1c-9.1 9.1-9.1 23.8 0 32.9 9.1 9.1 23.8 9.1 32.9 0l69.8-69.8c.5-.5 1-1.1 1.5-1.7.1-.1.2-.3.3-.4.4-.5.7-.9 1-1.4.1-.1.2-.3.3-.4l.9-1.5c.1-.1.1-.2.2-.3.3-.6.6-1.1.8-1.7 0-.1.1-.2.1-.2.3-.6.5-1.3.7-1.9 0-.1 0-.2.1-.3.2-.6.4-1.3.5-2 0-.2.1-.4.1-.6.1-.5.2-1.1.2-1.7.1-.8.1-1.5.1-2.3s0-1.6-.1-2.3c-.1-.6-.2-1.1-.2-1.7 0-.2-.1-.4-.1-.6-.1-.7-.3-1.3-.5-2 0-.1 0-.2-.1-.2-.2-.7-.4-1.3-.7-1.9 0-.1 0-.1-.1-.2-.2-.6-.5-1.2-.8-1.8-.1-.1-.1-.2-.1-.3l-.9-1.5c-.1-.1-.2-.3-.3-.4-.3-.5-.7-.9-1-1.4-.1-.1-.2-.3-.3-.4-.5-.6-1-1.2-1.5-1.7l-69.8-69.8c-4.5-4.5-10.5-6.8-16.5-6.8s-11.9 2.3-16.5 6.8c-9.1 9.1-9.1 23.8 0 32.9l30.1 29.9z" class="st0"/>
                        <path d="M149.4 611.3c63.5 0 122.6-31.5 158.1-84.3 7.2-10.7 4.3-25.1-6.3-32.3-10.7-7.2-25.1-4.3-32.3 6.3-26.8 39.9-71.5 63.7-119.5 63.7-79.3 0-143.8-64.5-143.8-143.8s64.5-143.8 143.8-143.8c47.9 0 92.4 23.7 119.3 63.4 7.2 10.7 21.7 13.5 32.3 6.3 10.6-7.2 13.5-21.7 6.3-32.3-35.5-52.5-94.5-83.9-157.8-83.9C44.4 230.5-41 315.9-41 420.9s85.4 190.4 190.4 190.4z" class="st0"/>
                    </g>
                </svg>
            </a>
        <?php else: ?>

        <?php endif; ?>



    </div>
    <!-- close .header_rightside -->
</header>


<!--<header class="header">
    <?php
/*    if(Yii::$app->user->isGuest):
    */?>

    <div class="header__container">
        <a href="/" class="header--logo" title="Главная Carbax">
            <img src="<?/*= Url::base() */?>/media/img/carbax-logo.png" alt="Carbax.ru">
        </a>

        <form action="#" class="header--region" id="auto_complete_form" method="post">
            <?/*= CityAutoComplete::widget(); */?>
        </form>

        <div class="loginLinks">
            <?/*=Html::a('Регистрация', Url::to('/register'), ['class'=>'regHeaderLink','title' => 'Регистрация на автопортале Carbax']) ." | ". Html::a('Вход', Url::to('/login'), ['class'=>'regHeaderLink','title' => 'Вход на автопортал Carbax']);*/?>
        </div>
    </div>
    <?php
/*    else:
    */?>
    <div class="header__container">
        <a href="/" class="header--logo" title="Главная Carbax">
            <img src="<?/*= Url::base() */?>/media/img/carbax-logo.png" alt="Carbax.ru">
        </a>
        <a href="<?/*=Url::to(['/profile/default/view'])*/?>" title="Профиль <?/*= User::getLogin(Yii::$app->user->id);*/?>" class="header--autotext"></a>
        <a href="<?/*=Url::to('/office')*/?>" title="Личный кабинет" class="header--perscab">Личный кабинет</a>
        <form action="#" class="header--region" id="auto_complete_form" method="post">
            <?/*= CityAutoComplete::widget(); */?>
        </form>
        <a href="<?/*=Url::to(['/message'])*/?>" title="Мои сообщения" class="header--messages">Мои сообщения <?/*= NumberUnreadMessages::widget(); */?></a>
        <a href="#" class="header--sales" title="Спецпредложения"><span>Спецпредложения</span></a>
        <div class="header--request">
            <a href="#" class="header--request--open" title="Оставить заявку на сервис">ЗАЯВКА НА СЕРВИС +</a>
            <?/*= SelectRequestTypes::widget(['classNav'=>'head-nav','classUl'=>'head-nav__list']); */?>

        </div>
        <?/*=Html::a('', [Url::to('/logout')], ['class'=>'header--logout', 'title'=>'Выйти', 'data'=>['method' => 'post']]);*/?>

    </div>
    <?php
/*    endif
    */?>
</header>-->