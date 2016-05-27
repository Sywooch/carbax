<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_type\models\ReclameType */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тип рекламы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="reclame-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
