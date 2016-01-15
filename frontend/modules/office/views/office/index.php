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
            <div class="serviceIcon"><a href="<?=Url::to('garage')?>"><img src="<?= Url::base(true) ?>/media/img/sto.png" alt=""></a></div>
            <div class="serviceLink">Гараж</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/my_requests']) ?>"><img src="<?= Url::base(true) ?>/media/img/zakaz.png" alt=""></a></div>
            <div class="serviceLink">Заявка</div>
        </div>
        <!--<div class="serviceItem">
            <div class="serviceIcon"><img src="<?/*= Url::base(true) */?>/media/img/zap.png" alt=""></div>
            <div class="serviceLink">Заявка на запчасти</div>
        </div>-->
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/flea_market/default/sale_auto']) ?>"><img src="<?= Url::base(true) ?>/media/img/sale_auto.png" alt=""></a></div>
            <div class="serviceLink">Продать авто</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/flea_market/default']) ?>"><img src="<?= Url::base(true) ?>/media/img/sale_zap.png" alt=""></a></div>
            <div class="serviceLink">Продать запчасти</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/offers/offers/index']) ?>"><img src="<?= Url::base(true) ?>/media/img/spec.png" alt=""></a></div>
            <div class="serviceLink">Спецпредлжения</div>
        </div>
        <div class="serviceItem">
            <div class="serviceIcon"><a href="<?= Url::to(['/favorites/default']) ?>"><img src="<?= Url::base(true) ?>/media/img/note_o.png" alt=""></a></div>
            <div class="serviceLink">Избранное</div>
        </div>

        <?php
            $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            if(!empty($role['business']) || !empty($role['admin']) || !empty($role['root'])):
        ?>

            <h2 class="h2-left">Управление бизнесом</h2>

            <div class="serviceItem">
                <div class="serviceIcon"><a href="<?=Url::to('select_service')?>"><img src="<?= Url::base(true) ?>/media/img/my_business.png" alt=""></a></div>
                <div class="serviceLink">Мой бизнес</div>
            </div>
            <!--<div class="serviceItem">
                <div class="serviceIcon"><img src="<?/*= Url::base(true) */?>/media/img/my_zav.png" alt=""></div>
                <div class="serviceLink">Мой заявки</div>
            </div>-->
            <div class="serviceItem">
                <div class="serviceIcon"><img src="<?= Url::base(true) ?>/media/img/sale_history.png" alt=""></div>
                <div class="serviceLink">История покупок</div>
            </div>
            <div class="serviceItem">
                <div class="serviceIcon"><a href="<?= Url::to(['/offers/offers/create']) ?>"><img src="<?= Url::base(true) ?>/media/img/procent.png" alt=""></a></div>
                <div class="serviceLink">Создать акцию</div>
            </div>
        <?php endif; ?>
    </div>
</section>