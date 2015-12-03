<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\request_add_form\models\RequestAddForm */

$this->title = 'Create Request Add Form';
$this->params['breadcrumbs'][] = ['label' => 'Request Add Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-add-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'requestType' => $requestType,
    ]) ?>

</div>
