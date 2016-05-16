<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
<section class="news">
    <div class="contain">
        <div class="news--topline">
            <a href="<?= Url::to(['/news/news/'])?>">
                <img src="/media/img/logo2.png" alt="CARBAX">
                <h3 class="orange">News</h3>
            </a>
            <span><a class="allNews" href="<?= Url::to(['/news/news/'])?>">Все новости</a></span>
        </div>
        <a href="<?= Url::to(['/news/news/view', 'id' => $news[0]['id']])?>" class="news__item--1">
            <img src="<?= $news[0]['img_url'];?>" alt="">
			<span class="news__item--title">
				<p><?= $news[0]['title']; ?></p>
			</span>
        </a>
        <div class="news--leftside">
            <a href="<?= Url::to(['/news/news/view', 'id' => $news[1]['id']])?>" class="news__item--2">
                <img src="<?= $news[1]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[1]['title']; ?></p>
				</span>
            </a>
            <a href="<?= Url::to(['/news/news/view', 'id' => $news[2]['id']])?>" class="news__item--3">
                <img src="<?= $news[2]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[2]['title']; ?></p>
				</span>
            </a>
            <a href="<?= Url::to(['/news/news/view', 'id' => $news[3]['id']])?>" class="news__item--4">
                <img src="<?= $news[3]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[3]['title']; ?></p>
				</span>
            </a>
        </div>
        <a href="<?= Url::to(['/news/news/view', 'id' => $news[4]['id']])?>" class="news__item--5">
            <img src="<?= $news[4]['img_url'];?>" alt="">
			<span class="news__item--title">
				<p><?= $news[4]['title']; ?></p>
			</span>
        </a>
    </div>
</section>
