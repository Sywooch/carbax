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
        <li><a href="#">Модули</a>
            <ul>
                <li><?= Html::a('Комфорт зоны', ['/comfort_zone']) ?></li>
                <li><?= Html::a('Типы авто', ['/auto_type']) ?></li>
                <li><?= Html::a('Новости', ['/news']) ?></li>
                <li><?= Html::a('Жалобы', ['/complaint']) ?></li>
            </ul>
        </li>

        <li><?= Html::a('Типы сервисов', ['/service_type']) ?></li>

        <li><a href="#">Заявки</a>
            <ul>
                <li><?= Html::a('Типы заявок', ['/request_type']) ?></li>
                <li><?= Html::a('Формы заявок', ['/request_add_form']) ?></li>
            </ul>
        </li>



        <li><?= Html::a('Пользователи', ['/user/admin/index']) ?></li>
        <li><?= Html::a('Объявления', ['/adsmanager']) ?></li>
        <li><?= Html::a('Спецпредложения', ['/offers']) ?></li>
        <li><?= Html::a('Страницы', ['/static_pages']) ?></li>
        <li><?= Html::a('Медиа-менеджер', ['/media']) ?></li>

    </ul>
</nav>