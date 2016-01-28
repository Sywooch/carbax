<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\adsmanager\models\Adsmanager */

$this->title = 'Create Adsmanager';
$this->params['breadcrumbs'][] = ['label' => 'Adsmanagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
