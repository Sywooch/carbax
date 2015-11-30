<?php

use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news_page">
	<div class="news__news-list">
		<?php
		$i=0;
		foreach($models as $n):
			?>
			<?php if ($i==0): ?>
			<div class="news__row filter__container">
		<?php endif ?>
			<div class="news__block">
				<img src="<?= $n->img_url?>" alt="">
				<a href="#" class="orange"><?= CategoryNews::find()->where(['id'=>$n['cat_id']])->one()->name ?></a>
				<a href="<?= Url::to(['news/view', 'id' => $n->id])?>" class="news__block-title"><?= $n->title ?></a>
				<!-- <div class="news-description"><?= $n->description?></div> -->
				<!-- <div class="news-date-add"><?= date('d-m-Y H:i', $n->dt_add) ?></div> -->
				<a href="#nowhere" class="news__block-eye"><i></i><?=$n->views?></a>
			</div>

			<?php
			$i=$i+1;
			if ($i==2):
				$i=0;
				?>
				</div>
			<?php endif ?>

			<?php
		endforeach;
		?>
		<?php if ($i!=0):?>
	</div>
	<?php endif ?>
	<?php
	// display pagination
	echo LinkPager::widget(['pagination' => $pages,]); ?>
</div>
</div>
