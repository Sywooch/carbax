<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Тип заявки";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="main-container">
<h3>Тип заявки</h3>
    <?php foreach($requestType as $rt): ?>

        <a href="<?= Url::to(['/request', 'id' => $rt->id]) ?>" class="busines-type--link">
				<span class="icon_b icon_b_autosalon" style="background-image: url('<?= $rt->icon ?>')">
				</span>
            <?= $rt->name ?>
        </a>
    <?php endforeach; ?>
</section>
