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
            <?php
            $i = 0;
            foreach ($models as $n):?>
                <?php if ($i == 0): ?>
                    <div class="offers__row filter__container">
                <?php endif ?>
                <div class="offers__block">
                    <img src="<?= $n->img_url ?>" alt="">
                    <a href="<?= Url::to(['offers/view', 'id' => $n->id]) ?>"
                       class="offers__block-title"><?= $n->title ?></a><br /><br />
                    <a class="btn btn-default btn-xs" href="<?= Url::to(['offers/edit', 'id' => $n->id]); ?>">Редактировать</a>
                    <br />
                    <br />
                    <a class="btn btn-danger btn-xs" href="<?= Url::to(['offers/delete', 'id' => $n->id]); ?>">Удалить</a>
                </div>

                <?php
                $i = $i + 1;
                if ($i == 2):
                    $i = 0;
                    ?>
                    </div>
                <?php endif ?>

                <?php
            endforeach;
            ?>
            <?php if ($i != 0): ?>
        </div>
        <?php endif ?>
        <?php
        // display pagination
        echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</section>