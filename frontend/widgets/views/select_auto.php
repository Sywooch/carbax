<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div data-view="<?= $view; ?>" class="selectCar">
    <?= Html::dropDownList(
        'typeAuto',
        0,
        ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль'],
        ['prompt' => 'Выберите тип', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto']
    ); ?>
    <?/*= Html::dropDownList(
        'manufactures',
        0,
        ArrayHelper::map($man, 'id', 'name'),
        ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'man'])
    */?>

</div>
