<?php
use yii\helpers\Html;
?>
<div class="regionWidgetBox">
    <?= $ip['region'] ?> / <?= $ip['city'] ?> <?= Html::a('Изменить', [], ['id' => 'changeRegion']) ?>
    <span id="hiddenRegionId">
        <input type="hidden" name="region" value="<?=$regionId?>">
        <input type="hidden" name="city" value="<?=$cityId?>">
    </span>
</div>
