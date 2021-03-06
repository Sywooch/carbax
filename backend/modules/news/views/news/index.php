<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\newsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Парсить новости', ['parse_news'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категории', '/secure/category_news/category_news/', ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            /*'user_id',*/
            'title',
            [
                'attribute' => 'img_url',
                'format' => 'html',
                'value' => function($model){
                    return Html::img($model->img_url, ['width' => '100px']);
                }
            ],
            /*'img_url:url',*/
            'description:ntext',
            // 'short_description:ntext',
            // 'dt_add',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
