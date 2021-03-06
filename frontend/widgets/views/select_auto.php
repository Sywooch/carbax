<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div data-view="<?= $view; ?>" class="selectCar selectCarAutoWidget">
    <?= Html::dropDownList(
        'typeAuto',
        0,
        ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=>'Мото транспорт'],
        ['prompt' => 'Выберите тип авто', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto', 'required' => 'required']
    ); ?>
    <?/*= Html::dropDownList(
        'manufactures',
        0,
        ArrayHelper::map($man, 'id', 'name'),
        ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'man'])
    */?>

    <?php if($select_from_garage): ?>
        <div class="selectFromGarage"><a id="selectAutoFromGarage" href="#">Выбрать авто из гаража</a></div>
    <?php endif; ?>
</div>
