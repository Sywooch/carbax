<?php

use common\models\db\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\complaint\models\ComplaintSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Жалобы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить жалобу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            [
                'attribute' => 'from_user',
                'format' => 'text',
                'value' => function($model){
                    return User::getLogin($model->from_user);
                }
            ],
            [
                'attribute' => 'to_object',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Ссылка на материал', Url::to($model->to_object), ['target' => '_blank']);
                }
            ],
            'subject',
            [
                'attribute' => 'dt_add',
                'format' => 'raw',
                'value' => function($model){
                    return date('d-m-Y H:i', $model->dt_add);
                }
            ],
            [
                'attribute' => 'read_complaint',
                'label' => 'Статус',
                'format' => 'text',
                'value' => function($model){
                    return ($model->read_complaint == 0) ? 'Новая' : 'Просмотренная';
                }
            ],

            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
