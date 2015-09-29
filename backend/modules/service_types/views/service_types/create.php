<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\service_types\models\Service_types */

$this->title = 'Создание типов услуг';
$this->params['breadcrumbs'][] = ['label' => 'Типы услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
    ]) ?>

</div>
