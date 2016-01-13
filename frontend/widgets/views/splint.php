<?php
use common\classes\Debug;
use yii\helpers\Html;
?>
<?php
$diameter = [];
for($i=7;$i<=30;$i++){
    $diameter[$i] = $i;
}

$section_width = [];
for($i=60;$i<=395;$i+=5){
    $section_width[$i] = $i;
}

$section_height = [];
for($i=25;$i<=110;$i+=5){
    $section_height[$i] = $i;
}

//Debug::prn($diameter);
echo Html::label('Диаметр');
echo Html::dropDownList('diameter',$model->diameter,$diameter,['prompt'=>'-','class'=>'addContent__adress']);


echo Html::label('Сезонность');
echo Html::dropDownList('seasonality',$model->seasonality,['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'-','class'=>'addContent__adress']);


echo Html::label('Ширина профиля');
echo Html::dropDownList('section_width',$model->section_width,$section_width,['prompt'=>'-','class'=>'addContent__adress']);

echo Html::label('Высота профиля');
echo Html::dropDownList('section_height',$model->section_height,$section_height,['prompt'=>'-','class'=>'addContent__adress']);