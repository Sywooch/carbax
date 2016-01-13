<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$printAddress = ($address) ? '1' : '0';
?>

<?= Html::dropDownList('regions',0, ArrayHelper::map($regions, 'id', 'name'),['class' => 'addContent__adress', 'id'=>'selectRegionWidget', 'prompt'=>'Регион']); ?>
<div class="cityWidget" id="cityBoxWidget" style="margin-top: 10px; height: <?=($defaultHeightSecondBlock!==false) ? $defaultHeightSecondBlock : ''?>"></div>
<div print-address="<?=$printAddress?>" id="addressBoxWidget" style="margin-top: 10px"></div>