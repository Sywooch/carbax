<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Тип заявки";
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="main-container">
    <?php foreach($requestType as $rt): ?>
        <div class="requestItem">
            <?= Html::a($rt->name, Url::to(['/request', 'id' => $rt->id])) ?>
        </div>
    <?php endforeach; ?>
</section>
