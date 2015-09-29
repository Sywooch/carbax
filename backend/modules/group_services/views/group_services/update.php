<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\group_services\models\Group_services */

$this->title = 'Update Group Services: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Group Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
