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

echo Html::dropDownList('diameterSplintSearch',$model->diameter,$diameter,['prompt'=>'Диаметр','class'=>'diameterSplintSearch']);



echo Html::dropDownList('seasonalitySearch',$model->seasonality,['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'Сезонность','class'=>'seasonalitySearch']);



echo Html::dropDownList('section_widthSearch',$model->section_width,$section_width,['prompt'=>'Ширина профиля','class'=>'section_widthSearch']);


echo Html::dropDownList('section_heightSearch',$model->section_height,$section_height,['prompt'=>'Высота профиля','class'=>'section_heightSearch']);