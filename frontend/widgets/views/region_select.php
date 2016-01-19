<?php
use yii\helpers\Html;
?>
<div class="regionWidgetBox">
    <?= $ip['region_name'] ?> / <?= $ip['city_name'] ?> <?= Html::a('Изменить', [], ['id' => 'changeRegion']) ?>
    <span id="hiddenRegionId">
        <input type="hidden" name="region" value="<?=$ip['region_id']?>">
        <input type="hidden" name="city" value="<?=$ip['city_id']?>">
    </span>
</div>
