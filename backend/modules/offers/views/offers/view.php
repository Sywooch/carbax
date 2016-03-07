<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\offers\models\OffersModels */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Offers Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-models-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'service_id',
            'img_url:url',
            'description:ntext',
            'new_price',
            'old_price',
            'discount',
            'region_id',
            'city_id',
            'dt_add',
            'service_type_id',
            'user_id',
            'address_selected:ntext',
            'dt_start',
            'dt_end',
            'status',
            'service_id_str',
            'circs:ntext',
        ],
    ]) ?>

</div>
