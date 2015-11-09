<?php
use yii\helpers\Html;
?>
<nav role='navigation'>
    <ul>
        <li><a href="/secure">Главная</a></li>
        <li><a href="#">Услуги</a>
            <ul>
                <li><?= Html::a('Виды услуг', ['/service_types']) ?></li>
                <li><?= Html::a('Группы услуг', ['/group_services']) ?></li>
            </ul>
        </li>
        <li><?= Html::a('Марки авто', ['/brand_cars']) ?></li>
        <li><?= Html::a('Типы сервисов', ['/service_type']) ?></li>
        <li><?= Html::a('Пользователи', ['/user/admin/index']) ?></li>
        <li><?= Html::a('Медиа-менеджер', ['/media']) ?></li>
        <li><?= Html::a('Комфорт зоны', ['/comfort_zone']) ?></li>
    </ul>
</nav>