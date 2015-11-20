<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\comfort_zone\models\ComfortZoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зоны комфорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comfort-zone-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!-- <p>
        <?/*= Html::a('Create Comfort Zone', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'img_ulr',
                'label' => 'Ярлык',
                'format' => 'html',
                'value' => function($model){
                    return Html::img($model->img_ulr);
                }
            ],

           /* ['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>

</div>
