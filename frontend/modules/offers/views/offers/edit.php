<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\News */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Личныйкабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form_edit', [
            'model' => $model,
            'services' => $services,
            'img' => $img,
        ]) ?>



