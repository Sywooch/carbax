<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
<section class="news">
    <div class="contain containNewsWr">
        <div class="news--topline">
            <img src="/media/img/logo2.png" alt="">
            <h3 class="orange">Похожие новости</h3>
        </div>
        <?php foreach($news as $new): ?>
            <div class="similarNewsWr">
                <div class="similarNewsHeader">
                    <div class="similarNewsInfo">
                        <span class="views"><?= $new->views; ?></span>
                    </div>
                    <div class="similarNewsDtAdd">
                        <?= date('d.m.Y', $new->dt_add) ?>
                    </div>
                </div>

                <div class="similarNewsImg">
                    <a href="<?= Url::to(['/news/news/view', 'id' => $new->id, 'slug' => $new->slug])?>">
                        <img src="<?=$new->img_url?>" alt="">
                    </a>
                </div>
                <div class="similarNewsCat">
                    <!--<a href="/news/news/all_news_cat?id=<?/*= $new['category_news']->id */?>"><span><?/*= $new['category_news']->name; */?></span></a>-->
                    <a href="/news/all-news/<?= $new['category_news']->id; ?>"><span><?= $new['category_news']->name; ?></span></a>
                </div>
                <div class="similarNewsTitle">
                    <!--<a href="/news/news/view?id=<?/*= $new->id;*/?>"><?/*= $new->title; */?></a>-->
                    <a href="<?= Url::to(['/news/news/view', 'id' => $new->id, 'slug' => $new->slug])?>"><?= $new->title; ?></a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>
