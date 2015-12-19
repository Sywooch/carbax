<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div data-view="<?= $view; ?>" class="selectCar">
    <?= Html::dropDownList(
        'manufactures',
        0,
        ArrayHelper::map($man, 'id', 'name'),
        ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'man'])
    ?>

</div>
