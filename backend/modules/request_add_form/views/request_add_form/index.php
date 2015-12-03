<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\request_add_form\models\RequestAddFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Add Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-add-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request Add Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
