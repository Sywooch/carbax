<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\request_type\models\RequestType */

$this->title = 'Создать тип заявки';
$this->params['breadcrumbs'][] = ['label' => 'Типы заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'formType' => $form,
        'serviceType' => $serviceType,
    ]) ?>

</div>
