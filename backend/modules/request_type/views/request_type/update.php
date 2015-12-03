<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_type\models\RequestType */

$this->title = 'Обновить тип заявки: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="request-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'selected' => $selected,
        'formType' => $formType,
        'selForm' =>  $selForm,
    ]) ?>

</div>
