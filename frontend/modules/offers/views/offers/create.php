<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\News */

$this->title = 'Создать спецпредложение';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
