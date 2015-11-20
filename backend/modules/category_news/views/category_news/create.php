<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\category_news\models\Category_news */

$this->title = 'Создать новую категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории новостей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
