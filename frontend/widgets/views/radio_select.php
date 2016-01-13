<?php
use frontend\widgets\InfoDisk;
use frontend\widgets\InfoSplint;
use frontend\widgets\SelectAuto;
use yii\helpers\Html;

?>
<div class="radio_select">
<?php
    echo Html::radioList('radio_type_product',$select,['1'=>'Запчасти','2'=>'Шины','3'=>'Диски'],['class'=>'radioTypeSelect']);
?>
</div>
<div class="view_widget">
    <?php
        switch ($select){
            case 1:
                echo SelectAuto::widget(['view' => ($_GET['type'] == 'zap') ? '1' : '0', 'auto' => $model, 'category' => $product->category_id_all]);
                break;
            case 2:
                echo InfoSplint::widget(['model'=>$model]);
                break;
            case 3:
                echo InfoDisk::widget(['model'=>$model]);
                break;
        }
    ?>
</div>
