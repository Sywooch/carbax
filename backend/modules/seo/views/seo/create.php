<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\seo\models\Seo */

$this->title = 'Create Seo';
$this->params['breadcrumbs'][] = ['label' => 'Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
