<?php


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\newsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
?>
<div class="news-page-content">
<?php
foreach($news as $n):
?>
	<div class="news-item">
	<h2><?= $n->title ?></h2>
	<div class="news-img"><img src="<?= $n->img_url?>" alt=""></div>
	<div class="news-description"><?= $n->description?></div>
	<div class="news-date-add"><?= date('d-m-Y H:i', $n->dt_add) ?></div>
	</div>

<?php
endforeach;
?>
</div>