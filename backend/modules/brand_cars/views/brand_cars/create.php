<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\brand_cars\models\BrandCars */

$this->title = 'Добавление марки авто';
$this->params['breadcrumbs'][] = ['label' => 'Марка авто', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-cars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
