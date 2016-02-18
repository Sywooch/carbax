<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\adsmanager\models\Adsmanager */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Adsmanagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-view">

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
            'user_id',
            'service_id',
            'id_auto_widget',
            'id_info_disk',
            'id_info_splint',
            'region_id',
            'city_id',
            'address',
            'name',
            'descr:ntext',
            'price',
            'dt_add',
            'id_auto_type',
            'category_id_all',
            'category_id',
            'prod_type',
            'views',
            'new',
            'run',
            'published',
        ],
    ]) ?>

</div>
