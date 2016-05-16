<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_zone\models\Reclame_zone */

$this->title = 'Создать зону';
$this->params['breadcrumbs'][] = ['label' => 'Зоны рекламы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reclame-zone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
