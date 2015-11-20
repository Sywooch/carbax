<?php
use yii\helpers\Html;
?>
<ul id="listColumn">
    <?php
    foreach ($cat as $c):
        ?>
        <li><?= Html::a($c['str_des'],['categ'=>$c['str_id'], 'region'=>$_GET['region'], 'manufactures'=>$_GET['manufactures'], 'search'=>$_GET['search']])?></li>
        <?php
    endforeach;
    ?>
</ul>