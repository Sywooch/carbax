<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_add_form\models\RequestAddForm */

$this->title = 'Обновить форму заявки: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Формы заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="request-add-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
