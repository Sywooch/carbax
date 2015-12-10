<?php

use himiklab\ipgeobase\IpGeoBase;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$checking=$news->img_url;

?>
    <section class="main-container">
        <div class="offers_page_view">
            <div class="news__date-add"><b>Дата добавления: </b><?= date('d.m.Y G:i', $model->dt_add) ?></div>
            <h1><?= $model->title ?></h1>

            <div class="offers__news-list">
                <div class="offers__descr"><b>Описание: </b><?= $model->description ?></div>
                <?php
                //$news->img_url;
                if ($model->img_url != ''):?>
                    <img class="offers__image" src="<?= $model->img_url ?>" alt="">
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php /*
$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB()
*/ ?>