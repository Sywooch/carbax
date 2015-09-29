<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\group_services\models\Group_services */

$this->title = 'Создать новую группу услуг';
$this->params['breadcrumbs'][] = ['label' => 'Группы услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
