<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$year = [];
for($i=1950;$i<=2016;$i++){
    $year[$i] = $i;
}


echo Html::dropDownList(
    'brandSearch',
    0,
    ArrayHelper::map($brand,'id','name'),
    ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
);
?>
<span class="modelSearch"><?php echo Html::dropDownList('modelAutoSearch',0,[],['prompt'=>'Модель','disabled'=>'disabled','class'=>'modelAutoSearch']);?></span>

<div class="DopparamsSearch">
    <div class="infoDopSearch">
        <span>Год выпуска</span>
        <?= Html::label('От:'); ?>
        <?= Html::dropDownList('search_year_from',0,$year,['class'=>'search_year_from','prompt'=>'От']); ?>

        <?= Html::label('До:'); ?>
        <?= Html::dropDownList('search_year_to',0,$year,['class'=>'search_year_to','prompt'=>'До']); ?>
    </div>

    <div class="infoDopSearch">
        <span>Объем двигателя</span>
        <?= Html::label('От:'); ?>
        <?= Html::textInput('searchSizeMotor_from','',['class'=>'searchSizeMotor_from']); ?>

        <?= Html::label('До:'); ?>
        <?= Html::textInput('searchSizeMotor_to','',['class'=>'searchSizeMotor_to']); ?>
    </div>
    <div class="infoDopSearch">
        <span>Пробег</span>
        <?= Html::label('От:'); ?>
        <?= Html::textInput('searchRunFrom','',['class'=>'searchRunFrom']); ?>

        <?= Html::label('До:'); ?>
        <?= Html::textInput('searchRunTo','',['class'=>'searchRunTo']); ?>
    </div>
    <div class="infoDopSearch">
        <span>Цена</span>
        <?= Html::label('От:'); ?>
        <?= Html::textInput('searchPriceFrom','',['class'=>'searchPriceFrom']); ?>

        <?= Html::label('До:'); ?>
        <?= Html::textInput('searchPriceTo','',['class'=>'searchPriceTo']); ?>
    </div>
</div>
