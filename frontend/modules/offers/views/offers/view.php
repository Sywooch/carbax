<?php

use himiklab\ipgeobase\IpGeoBase;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$checking=$news->img_url;
?>
<div class="offers_page_view">
    <div class="news__date-add"><?= date('d.m.Y G:i', $model->dt_add) ?></div>
    <h1><?= $model->title?></h1>
    <div class="offers__news-list">
        <div class="offers__descr"><?= $model->description?></div>
        <?php
        //$news->img_url;
        if($model->img_url!=''):?>
            <img class="offers__image" src="<?= $model->img_url?>" alt="">
        <?php endif; ?>

    </div>
</div>
<?php /*
$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB()
*/?>