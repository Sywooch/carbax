<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\adsmanager\models\AdsmanagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Adsmanager', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'service_id',
            //'id_auto_widget',
            //'id_info_disk',
            // 'id_info_splint',
            // 'region_id',
            // 'city_id',
            // 'address',
             'name',
             'descr:ntext',
            // 'price',
            // 'dt_add',
            [
                'attribute' => 'dt_add',
                'format' => 'raw',
                'value' => function($model){
                    return date('d-m-Y H:i', $model->dt_add);
                }
            ],
            // 'id_auto_type',
            // 'category_id_all',
            // 'category_id',
            // 'prod_type',
            // 'views',
            // 'new',
            // 'run',
             //'published',
            [
                'attribute' => 'published',
                'format' => 'html',
                'value' => function($model){
                    if($model->published == 1){
                        $html = '<span class="bg-success">Опубликовано</span>';
                    }
                    if($model->published == 0){
                        $html = '<span class="bg-info">Не опубликовано</span>';
                    }
                    if($model->published == 2){
                        $html = '<span class="bg-danger">Заблокирован</span>';
                    }
                    return $html;

                }
            ],
            [
                'attribute' => 'Действие',
                'format' => 'raw',
                'value' => function($model){
                    $html = Html::a('Посмотреть',Yii::$app->urlManagerFrontend->createUrl('flea_market/default/view')."?id=".$model->id, ['target'=>'blank', 'class'=>'btn btn-primary']);
                    $html .= Html::a('Заблокировать', ['block', 'id'=>$model->id, 'page'=>(isset($_GET['page'])) ? $_GET['page'] : ''], ['class'=>'btn btn-danger']);
                    $html .= Html::a('Опубликовать',['publish', 'id'=>$model->id, 'page'=>(isset($_GET['page'])) ? $_GET['page'] : ''], ['class'=>'btn btn-success']);
                    /*$html .= Html::a('Удалить',null, ['class'=>'btn btn-warning']);*/

                    //$html = "<a href='flea_market/default/view?id=$model->id' target='_blank' class='btn btn-primary' >Посмотреть</a>";

                    return($html);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>

</div>
