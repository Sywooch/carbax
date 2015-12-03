<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\garage\models\GarageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Гараж';
/*$this->params['breadcrumbs'][] = $this->title;*/

$this->registerCssFile('/css/bootstrap.min.css');
?>
<div class="garage-index">
    <section class="main-container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить автомобиль', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h4>Мои авто</h4>
    <table class="table table-bordered">
    <?php foreach($car as $c): ?>
        <tr>
            <td>
                <?=$c['title']?>
            </td>
            <td>
                <?= Html::a('Удалить', ['delete', 'id'=>$c['id']], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Удалить авто?', 'method' => 'post',]]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</section>
</div>
