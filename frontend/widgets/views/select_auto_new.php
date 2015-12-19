<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<span id="selectAutoNew">
    <?= Html::dropDownList('manufactures', 0, ArrayHelper::map($man, 'mfa_id', 'mfa_brand'),
        [
            'class' => 'addContent__adress selectAutoNew',
            'id' => 'man_new',
            'step' => 'man',
            'prompt' => 'Выберите марку авто'
        ]) ?>
</span>
