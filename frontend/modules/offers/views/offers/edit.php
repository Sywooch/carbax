<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\News */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
    <div class="offers-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</section>
