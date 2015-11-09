<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\comfort_zone\models\ComfortZone */

$this->title = 'Create Comfort Zone';
$this->params['breadcrumbs'][] = ['label' => 'Comfort Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comfort-zone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
