<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_add_form\models\RequestAddForm */

$this->title = 'Update Request Add Form: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Add Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-add-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
