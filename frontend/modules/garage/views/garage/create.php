<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */

$this->title = 'Добавить авто';
$this->params['breadcrumbs'][] = ['label' => 'Garages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
    <div class="garage-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</section>