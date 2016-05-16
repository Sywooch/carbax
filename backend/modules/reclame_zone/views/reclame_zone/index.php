<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\reclame_zone\models\Reclame_zoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зоны рекламы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reclame-zone-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить зону', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
