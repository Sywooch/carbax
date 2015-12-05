<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div data-view="<?= $view; ?>" class="selectCar">
    <?= Html::dropDownList(
        'manufactures',
        0,
        ArrayHelper::map($man, 'mfa_id', 'mfa_brand'),
        ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'man'])
    ?>

</div>
