<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<?= Html::dropDownList('regions',0, ArrayHelper::map($regions, 'id', 'name'),['id'=>'selectRegionWidget', 'prompt'=>'Регион']); ?>
<div class="cityWidget" id="cityBoxWidget" style="margin-top: 10px"></div>
<div id="addressBoxWidget" style="margin-top: 10px"></div>