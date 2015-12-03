<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\request_type\models\RequestType */

$this->title = 'Create Request Type';
$this->params['breadcrumbs'][] = ['label' => 'Request Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'formType' => $form,

    ]) ?>

</div>
