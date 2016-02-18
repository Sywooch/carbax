<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\service_types\models\Service_typesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы услуг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-types-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать тип услуги', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'name',

            [
                'attribute' => 'group_id',
                'label' => 'Группа услуг',
                'format' => 'html',
                'value' => function($model){
                    $group = \common\models\db\AddFieldsGroup::find()->where(['id'=>$model->group_id])->one();
                    return $group->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
