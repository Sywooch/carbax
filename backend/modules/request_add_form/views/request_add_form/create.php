<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\request_add_form\models\RequestAddForm */

$this->title = 'Создать форму заявки';
$this->params['breadcrumbs'][] = ['label' => 'Формы заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-add-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'requestType' => $requestType,
    ]) ?>

</div>
