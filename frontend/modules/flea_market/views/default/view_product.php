<?php
use common\models\db\Services;

$this->title = $product->name;
$this->registerCssFile('/css/bootstrap_btn.min.css');

?>

<section class="main-container">
    <?php
    $this->params['breadcrumbs'][] = ['label' => 'Мои запчасти', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    ?>
    <h1><?= $this->title ?></h1>
    <h3>Название товара:</h3><?=$product->name;?>
    <h3>Марка:</h3><?=$info->brand_name;?>
    <h3>Модель:</h3><?=$info->model_name;?>
    <h3>Тип:</h3><?=$info->type_name;?>
    <h3>Регион:</h3><?=$region->name;?>
    <h3>Город:</h3><?=$city->name;?>
    <h3>Описание:</h3>
    <?=$product->descr?>
    <h3>Цена:</h3>
    <?=$product->price?>
    <h3>Категория</h3>
    <?=$category?>
    <?php
        if($product->service_id == 0){
        ?>
        <div>Добавлено от пользователя</div>
        <?php
        }
        else{
        ?>
        <div>Добавлено от сервиса <?= Services::find()->where(['id'=>$product->service_id])->one()->name?></div>
    <?php
        }
    ?>
</section>