<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\ServiceType */

$this->title = 'Редактировать Типы сервисов: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы сервисов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="service-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'selected' => $selected,
        'icon' => $icon,
    ]) ?>

</div>
