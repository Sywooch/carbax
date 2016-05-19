<?php
use common\classes\Debug;
use yii\helpers\Url;

$this->title = "Личный кабинет";
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
    <div class="serviceSelectWrap">
        <h2>Личный кабинет</h2>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?=Url::to('garage')?>" title="Перейти в гараж"><img src="<?= Url::base(true) ?>/media/img/sto.png" alt="Гараж"></a></div>
            <div class="serviceLink">Гараж</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to('my_requests') ?>" title="Отправить заявку"><img src="<?= Url::base(true) ?>/media/img/zakaz.png" alt="Заявка"></a></div>
            <div class="serviceLink">Заявка</div>
        </div>
        <!--<div class="serviceItem">
            <div class="serviceIcon"><img src="<?/*= Url::base(true) */?>/media/img/zap.png" alt=""></div>
            <div class="serviceLink">Заявка на запчасти</div>
        </div>-->
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to('flea-market/sale_auto') ?>" title="Продать авто"><img src="<?= Url::base(true) ?>/media/img/sale_auto.png" alt="Продать авто"></a></div>
            <div class="serviceLink">Продать авто</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to('flea-market/sale_parts') ?>" title="Продать запчасти"><img src="<?= Url::base(true) ?>/media/img/sale_zap.png" alt="Продать запчасти"></a></div>
            <div class="serviceLink">Продать запчасти</div>
        </div>
       <!-- <div class="serviceItem">
            <div class="serviceIcon"><a href="<?/*= Url::to('offers') */?>"><img src="<?/*= Url::base(true) */?>/media/img/spec.png" alt=""></a></div>
            <div class="serviceLink">Спецпредложения</div>
        </div>-->
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to('favorites') ?>" title="Избранное"><img src="<?= Url::base(true) ?>/media/img/note_o.png" alt="Избранное"></a></div>
            <div class="serviceLink">Избранное</div>
        </div>

        <?php
            $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            if(!empty($role['business']) || !empty($role['admin']) || !empty($role['root'])):
        ?>

            <h2 class="h2-left">Управление бизнесом</h2>

            <div class="serviceItem">
                <div class="serviceIcon"><a href="<?=Url::to('select-service')?>" title="Управление бизнесом"><img src="<?= Url::base(true) ?>/media/img/my_business.png" alt="Управление бизнесом"></a></div>
                <div class="serviceLink">Мой бизнес</div>
            </div>
            <!--<div class="serviceItem">
                <div class="serviceIcon"><img src="<?/*= Url::base(true) */?>/media/img/my_zav.png" alt=""></div>
                <div class="serviceLink">Мой заявки</div>
            </div>-->
            <div class="serviceItem">
                <div class="serviceIcon"><a href="<?= Url::to('offers');?>" title="Спецпредложения"><img src="<?= Url::base(true) ?>/media/img/sale_history.png" alt="Спецпредложения"></a></div>
                <div class="serviceLink">Спецпредложения</div>
            </div>
            <div class="serviceItem">
                <div class="serviceIcon"><a href="<?= Url::to('offers/create') ?>" title="Создать акцию"><img src="<?= Url::base(true) ?>/media/img/procent.png" alt="Создать акцию"></a></div>
                <div class="serviceLink">Создать акцию</div>
            </div>
        <?php endif; ?>
    </div>
</section>