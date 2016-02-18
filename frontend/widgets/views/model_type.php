<?php
use yii\helpers\Html;

foreach ($_GET as $key=>$value) {
    $get[$key] = $value;
}
?>
<?php if(!isset($_GET['typeModelSearch'])): ?>
<ul id="listColumn">
    <?php foreach ($model as $m):?>
        <?php
            if(isset($_GET['modelSearch'])){
                $get['typeModelSearch'] = $m->id;
            }
            else{
                $get['modelSearch'] = $m->id;
            }
        ?>
        <li><?= Html::a($m->name,$get); ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>