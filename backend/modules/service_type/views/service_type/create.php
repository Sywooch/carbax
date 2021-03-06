<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\ServiceType */

$this->title = 'Добавить Тип сервиса';
$this->params['breadcrumbs'][] = ['label' => 'Типы сервисов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'icon' => $icon,
    ]) ?>

</div>
