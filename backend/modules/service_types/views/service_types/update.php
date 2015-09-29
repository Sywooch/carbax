<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\service_types\models\Service_types */

$this->title = 'Обновление типа услуги: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Виды услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="service-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
    ]) ?>

</div>
