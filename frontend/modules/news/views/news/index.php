<?php

use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости';

$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag([
	'name' => 'description',
	'content' => $catInfo->meta_description,
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $catInfo->meta_keywords,
]);

?>

<section class="news">
	<?= \frontend\modules\news\widgets\MenuNewsWidget::widget(); ?>
<h1><?= (isset($_GET['id'])) ? $catInfo->name : $titleNews; ?></h1>
	<?php if (isset($news[0])): ?>
		<a href="<?= Url::to(['/news/news/view', 'id' => $news[0]['id']])?>" class="news__item--1">
			<img src="<?= $news[0]['img_url'];?>" alt="<?= $news[0]['title']; ?>">
			<span class="news__item--title">
				<p><?= $news[0]['title']; ?></p>
			</span>
		</a>
	<?php endif; ?>
		<div class="news--leftside">
			<?php if (isset($news[1])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[1]['id']])?>" class="news__item--2">
					<img src="<?= $news[1]['img_url'];?>" alt="<?= $news[1]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[1]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
			<?php if (isset($news[2])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[2]['id']])?>" class="news__item--3">
					<img src="<?= $news[2]['img_url'];?>" alt="<?= $news[2]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[2]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
			<?php if (isset($news[3])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[3]['id']])?>" class="news__item--4">
					<img src="<?= $news[3]['img_url'];?>" alt="<?= $news[3]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[3]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
		</div>
	<?php if (isset($news[4])): ?>
		<a href="<?= Url::to(['/news/news/view', 'id' => $news[4]['id']])?>" class="news__item--5">
			<img src="<?= $news[4]['img_url'];?>" alt="<?= $news[4]['title']; ?>">
			<span class="news__item--title">
				<p><?= $news[4]['title']; ?></p>
			</span>
		</a>
	<?php endif; ?>
	<?php if (isset($news[5])): ?>
		<a href="<?= Url::to(['/news/news/view', 'id' => $news[5]['id']])?>" class="news__item--1">
			<img src="<?= $news[5]['img_url'];?>" alt="<?= $news[5]['title']; ?>">
			<span class="news__item--title">
				<p><?= $news[5]['title']; ?></p>
			</span>
		</a>
	<?php endif; ?>
		<div class="news--leftside">
			<?php if (isset($news[6])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[6]['id']])?>" class="news__item--2">
					<img src="<?= $news[6]['img_url'];?>" alt="<?= $news[6]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[6]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
			<?php if (isset($news[7])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[7]['id']])?>" class="news__item--3">
					<img src="<?= $news[7]['img_url'];?>" alt="<?= $news[7]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[7]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
			<?php if (isset($news[8])): ?>
				<a href="<?= Url::to(['/news/news/view', 'id' => $news[8]['id']])?>" class="news__item--4">
					<img src="<?= $news[8]['img_url'];?>" alt="<?= $news[8]['title']; ?>">
					<span class="news__item--title">
						<p><?= $news[8]['title']; ?></p>
					</span>
				</a>
			<?php endif; ?>
		</div>
	<?php if (isset($news[9])): ?>
		<a href="<?= Url::to(['/news/news/view', 'id' => $news[9]['id']])?>" class="news__item--5">
			<img src="<?= $news[9]['img_url'];?>" alt="<?= $news[9]['title']; ?>">
			<span class="news__item--title">
				<p><?= $news[9]['title']; ?></p>
			</span>
		</a>
	<?php endif; ?>
	<div class="cleared"></div>
		<?php
            echo LinkPager::widget(['pagination' => $pages,]); ?>

</section>