<?php
use yii\helpers\Url;

$this->title = "Личный кабинет";
?>
<section class="main-container">
    <div class="serviceSelectWrap">
        <h2>Личный кабинет</h2>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?=Url::to('garage')?>"><img src="<?= Url::base(true) ?>/media/img/sto.png" alt=""></a></div>
            <div class="serviceLink">Гараж</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/zakaz.png" alt=""></div>
            <div class="serviceLink">Заявка на сервис</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/zap.png" alt=""></div>
            <div class="serviceLink">Заявка на запчасти</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/sale_auto.png" alt=""></div>
            <div class="serviceLink">Продать авто</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/flea_market/default']) ?>"><img src="<?= Url::base(true) ?>/media/img/sale_zap.png" alt=""></a></div>
            <div class="serviceLink">Продать запчасти</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/spec.png" alt=""></div>
            <div class="serviceLink">Спецпредлжения</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/note_o.png" alt=""></div>
            <div class="serviceLink">Блокнот</div>
        </div>

        <h2 class="h2-left">Управление бизнесом</h2>

        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?=Url::to('select_service')?>"><img src="<?= Url::base(true) ?>/media/img/my_business.png" alt=""></a></div>
            <div class="serviceLink">Мой бизнес</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/my_zav.png" alt=""></div>
            <div class="serviceLink">Мой заявки</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/sale_history.png" alt=""></div>
            <div class="serviceLink">История покупок</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/procent.png" alt=""></div>
            <div class="serviceLink">Создать акцию</div>
        </div>
    </div>
</section>