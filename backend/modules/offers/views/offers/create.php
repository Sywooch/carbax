<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\offers\models\OffersModels */

$this->title = 'Create Offers Models';
$this->params['breadcrumbs'][] = ['label' => 'Offers Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
