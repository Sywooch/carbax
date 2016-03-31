<?php
use yii\helpers\Html;

$this->title = 'Удалить профиль?';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['/profile/default/view']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container" >
        <p class="text-center">
                <?= Html::img('/media/img/delprofile.png'); ?>
        </p>
        <p class="regInfo"><span class="regInfoOrange">Все ваши данные а так же данные о бизнесе будут удалены!!!</span></p>
        <p class="regInfo"><span class="regInfoOrange">Вы действительно хотите удалить профиль?</span></p>

        <p class="regInfo"> <?= Html::a('Да', \yii\helpers\Url::to('/profile/default/del_prof'),['class'=>'btn btn-danger']); ?>
        <?= Html::a('Нет', \yii\helpers\Url::to('/profile/default/view'),['class'=>'btn btn-success']); ?></p>

</section>
