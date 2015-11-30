<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<span id="categoryBox">
     <?/*= Html::dropDownList('autotype',0,ArrayHelper::map($autotype,'id','name'),['class'=>'addContent__adress catSel firstCatSel','prompt'=>'Выберите категорию'])*/?>
<?=Html::dropDownList('main_cat',0, ArrayHelper::map($searchTree, 'str_id', 'str_des'),['class'=>'addContent__adress catSel', 'id'=>'mainCat','prompt'=>'Выберите Категорию']);?>
</span>