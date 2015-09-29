<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\garage\models\GarageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Гараж';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить автомобиль', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        foreach ($car as $v){
            if($v->type_car == 1){
                $type = 'Легковой автомобиль';
            }
            if($v->type_car == 2){
                $type = 'Грузовой автомобиль';
            }
            if($v->type_car == 3){
                $type = 'Мотоцикл';
            }
    ?>
        <div>
            <?=$type;?><br />
            <span>Марка: <?=$v->brand;?></span>
            <span>Модель: <?=$v->models;?></span>
            <span>Год выпуска: <?=$v->year;?></span>
            <span>ДВС: <?=$v->dvs;?></span>
            <span>КПП: <?=$v->kpp;?></span>
            <a href="/garage/garage/delete?id=1" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
        </div>
    <?php
        }
    ?>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_car',
            'brand',
            'models:ntext',
            // 'year:ntext',
            // 'dvs:ntext',
            // 'kpp:ntext',
            // 'dt_add:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>

</div>
