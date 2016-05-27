<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_template\models\ReclameTemplate */

$this->title = 'Create Reclame Template';
$this->params['breadcrumbs'][] = ['label' => 'Reclame Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reclame-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'zone' => $zone,
    ]) ?>

</div>
