<?php
use yii\helpers\Html;

foreach ($_GET as $key=>$value) {
    $get[$key] = $value;
}


?>
<div class="catPath categoryPass">
<?php foreach ($catPath as $k=>$p): ?>
    <?php $get['categ'] = $k;?>
    <span><?= Html::a($p,$get)?>/</span>
<?php endforeach ?>
</div>
<ul id="listColumn">
<?php foreach ($cat as $c): ?>
    <?php $get['categ'] = $c['str_id'];?>
    <li><?= Html::a($c['str_des'],$get, ['class' => 'categoryName'])?></li>
<?php endforeach; ?>
</ul>