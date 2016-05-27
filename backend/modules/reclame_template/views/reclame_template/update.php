<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_template\models\ReclameTemplate */

$this->title = 'Update Reclame Template: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reclame Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reclame-template-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'zone' => $zone,
    ]) ?>

</div>
