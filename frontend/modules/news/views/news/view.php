<?php

$this->title = $news->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['page']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news_page_view">
    <div class="news__date-add"><?= date('d.m.Y G:i', $news->dt_add) ?></div>
    <h1><?= $news->title?></h1>
    <div class="news__news-list">

        <div class="news__descr"><?= $news->description?></div>
        <img class="news__image" src="<?= $news->img_url?>" alt="">
    </div>
</div>
