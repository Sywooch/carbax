<?php

use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости';

$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="news_page">
	<div class="news__news-list">
		<?php
/*		$i=0;
		foreach($models as $n):
			*/?>
			<?php /*if ($i==0): */?>
			<div class="news__row filter__container">
		<?php /*endif */?>
			<div class="news__block">
				<img src="<?/*= $n->img_url*/?>" alt="">
				<a href="#" class="orange"><?/*= CategoryNews::find()->where(['id'=>$n['cat_id']])->one()->name */?></a>
				<a href="<?/*= Url::to(['news/view', 'id' => $n->id])*/?>" class="news__block-title"><?/*= $n->title */?></a>
				<!-- <div class="news-description"><?/*= $n->description*/?></div> -->
				<!-- <div class="news-date-add"><?/*= date('d-m-Y H:i', $n->dt_add) */?></div>
				<a href="#nowhere" class="news__block-eye"><i></i><?/*=$n->views*/?></a>
			</div>

			<?php
/*			$i=$i+1;
			if ($i==2):
				$i=0;
				*/?>
				</div>
			<?php /*endif */?>

			<?php
/*		endforeach;
		*/?>
		<?php /*if ($i!=0):*/?>
	</div>
	<?php /*endif */?>
	<?php
/*	// display pagination
	echo LinkPager::widget(['pagination' => $pages,]); */?>
<</div>
</div>-->
<section class="news">
	<?= \frontend\modules\news\widgets\MenuNewsWidget::widget(); ?>


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

		<a href="<?= Url::to(['/news/news/view', 'id' => $news[5]['id']])?>" class="news__item--1">
			<img src="<?= $news[5]['img_url'];?>" alt="">
			<span class="news__item--title">
				<p><?= $news[5]['title']; ?></p>
			</span>
		</a>
		<div class="news--leftside">
			<a href="<?= Url::to(['/news/news/view', 'id' => $news[6]['id']])?>" class="news__item--2">
				<img src="<?= $news[6]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[6]['title']; ?></p>
				</span>
			</a>
			<a href="<?= Url::to(['/news/news/view', 'id' => $news[7]['id']])?>" class="news__item--3">
				<img src="<?= $news[7]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[7]['title']; ?></p>
				</span>
			</a>
			<a href="<?= Url::to(['/news/news/view', 'id' => $news[8]['id']])?>" class="news__item--4">
				<img src="<?= $news[8]['img_url'];?>" alt="">
				<span class="news__item--title">
					<p><?= $news[8]['title']; ?></p>
				</span>
			</a>
		</div>
		<a href="<?= Url::to(['/news/news/view', 'id' => $news[9]['id']])?>" class="news__item--5">
			<img src="<?= $news[9]['img_url'];?>" alt="">
			<span class="news__item--title">
				<p><?= $news[9]['title']; ?></p>
			</span>
		</a>

		<?php
            echo LinkPager::widget(['pagination' => $pages,]); ?>

</section>