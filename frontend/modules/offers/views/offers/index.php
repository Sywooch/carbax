<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Спецпредложения';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>
<section class="main-container">
    <div class="offers_page">
        <div class="offers__offers-list">
            <table class="table table-condensed">
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th></th>
                </tr>
            <?php foreach ($models as $n): ?>
                <tr>
                    <td> <div class="offers__block"><img src="<?= $n->img_url ?>" alt=""></div></td>
                    <td><a href="<?= Url::to(['offers/view', 'id' => $n->id]) ?>" class="offers__block-title"><?= $n->title ?></a></td>
                    <td><a class="btn btn-default btn-xs" href="<?= Url::to(['offers/edit', 'id' => $n->id]); ?>">Редактировать</a>
                        <a class="btn btn-danger btn-xs" href="<?= Url::to(['offers/delete', 'id' => $n->id]); ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            </table>
     
        <?php
        // display pagination
        echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</section>