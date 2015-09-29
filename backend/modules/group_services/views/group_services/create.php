<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\group_services\models\Group_services */

$this->title = 'Create Group Services';
$this->params['breadcrumbs'][] = ['label' => 'Group Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
