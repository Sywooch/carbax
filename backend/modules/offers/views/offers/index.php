<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\offers\models\OffersModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спецпредложения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-models-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Offers Models', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            /*'service_id',*/
            /*'img_url:url',*/
            /*'description:ntext',*/
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
             //'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                    return ($model->status == 0) ? '<div class="imgPubl"><img id="'.$model->id.'" status="'.$model->status.'" class="offersPubl" src="images/publish_x.png" /></div>' : '<div class="imgPubl"><img status="'.$model->status.'" id="'.$model->id.'" class="offersPubl" src="images/tick.png" /></div>';
                }
            ],
            // 'service_id_str',
            // 'circs:ntext',
            [
                'label' => 'Посмотреть',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a(
                        'Перейти',
                        Yii::$app->urlManagerFrontend->createAbsoluteUrl(['offers/offers/view','id'=>$model->id]),
                        [
                            'title' => 'Посмотреть',
                            'target' => '_blank'
                        ]
                    );
                }
            ],
            ['class' => 'yii\grid\ActionColumn','template' => '{delete}'],

        ],
    ]); ?>

</div>
