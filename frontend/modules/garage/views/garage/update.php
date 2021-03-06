<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */

$this->title = 'Редактировать авто: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Garages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="main-container">
    <div class="garage-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</section>
