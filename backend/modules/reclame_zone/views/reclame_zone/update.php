<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_zone\models\Reclame_zone */

$this->title = 'Update Reclame Zone: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Reclame Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reclame-zone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
