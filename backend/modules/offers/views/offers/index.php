<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\offers\models\OffersModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-models-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Offers Models', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'service_id',
            'img_url:url',
            'description:ntext',
            // 'new_price',
            // 'old_price',
            // 'discount',
            // 'region_id',
            // 'city_id',
            // 'dt_add',
            // 'service_type_id',
            // 'user_id',
            // 'address_selected:ntext',
            // 'dt_start',
            // 'dt_end',
            // 'status',
            // 'service_id_str',
            // 'circs:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
