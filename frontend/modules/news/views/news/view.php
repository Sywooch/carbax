<?php

use himiklab\ipgeobase\IpGeoBase;

$this->title = $news->title . ' | CARBAX новости | CARBAX все автоуслуги Вашего города' ;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => \yii\helpers\Url::to(['/news']) ];
$this->params['breadcrumbs'][] = $news->title;
$checking=$news->img_url;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $news->meta_description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $news->meta_keywords,
]);

?>
<div class="news_page_view">
    <div class="news__category"><a href="/news/all-news/<?= $news['category_news']->id; ?>"><?= $news['category_news']->name; ?></a></div>

    <div class="news__date-add"><?= date('d.m.Y G:i', $news->dt_add) ?></div>
    <h1><?= $news->title?></h1>
    <div class="news__news-list">
        <?php
        //$news->img_url;
        if($news->img_url!=''):?>
            <img class="news__image" src="<?= $news->img_url?>" alt="<?= $news->title?>">
        <?php endif; ?>
        <div class="news__descr"><?= $news->description?></div>
        <?= \frontend\modules\news\widgets\SimilarNews::widget(['idNews'=> $news->id, 'idCat' => $news['category_news']->id])?>

    </div>
</div>




<?php
/*$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB()
*/?>


