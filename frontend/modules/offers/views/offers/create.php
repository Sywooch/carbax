<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\News */

$this->title = 'Создать спецпредложение';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addContent">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>