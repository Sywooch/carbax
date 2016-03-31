<?php
$this->title = 'Удалить профиль?';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['/profile/default/view']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container" >

        Вы действительно хотите удалить профиль?
        Все ваши данные а так же данные о бизнесе будут удалены!!!
        <?= \yii\helpers\Html::a('Да', \yii\helpers\Url::to('/profile/default/del_prof')); ?>
        <?= \yii\helpers\Html::a('Нет', \yii\helpers\Url::to('/profile/default/view')); ?>

</section>
