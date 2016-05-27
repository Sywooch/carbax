<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_type\models\ReclameType */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Тип рекламы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reclame-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
