<?php
use common\models\db\Services;

$this->title = $product->name;
$this->registerCssFile('/css/bootstrap_btn.min.css');

?>

<section class="main-container">
    <h3>Название товара:</h3><?=$product->name;?>
    <h3>Марка:</h3><?=$marka->mfa_brand;?>
    <h3>Модель:</h3><?=$model->mod_name;?>
    <h3>Тип:</h3><?=$type->typ_mmt_cds;?>
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