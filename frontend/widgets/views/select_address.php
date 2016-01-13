<?php

use common\models\db\GeobaseCity;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$printAddress = ($address) ? '1' : '0';
?>
<?php
$region = ($defaultRegion) ? $defaultRegion : 0;
?>
<?= Html::dropDownList(
    'regions',
    $region,
    ArrayHelper::map($regions, 'id', 'name'),
    ['class' => 'addContent__adress', 'id'=>'selectRegionWidget', 'prompt'=>'Регион']
); ?>
<div class="cityWidget" id="cityBoxWidget" style="margin-top: 10px; height: <?=($defaultHeightSecondBlock!==false) ? $defaultHeightSecondBlock : ''?>">
    <?php if($defaultCity) {
        $city = GeobaseCity::find()->where(['region_id' => $defaultRegion])->all();
        echo Html::dropDownList('city_widget', $defaultCity, ArrayHelper::map($city, 'id', 'name'), ['id' => 'selectCityWidgetEdit', 'prompt' => 'Город', 'class' => 'addContent__adress']);
    } ?>
</div>
<div print-address="<?=$printAddress?>" id="addressBoxWidget" style="margin-top: 10px"></div>