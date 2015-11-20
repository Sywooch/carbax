<?php
use yii\helpers\Html;
?>
<div class="catPath">
<?php foreach ($catPath as $k=>$p): ?>
    <span><?= Html::a($p,['categ'=>$k, 'region'=>$_GET['region'], 'manufactures'=>$_GET['manufactures'], 'search'=>$_GET['search']])?>/</span>
<?php endforeach ?>
</div>
<ul id="listColumn">
<?php foreach ($cat as $c): ?>
    <li><?= Html::a($c['str_des'],['categ'=>$c['str_id'], 'region'=>$_GET['region'], 'manufactures'=>$_GET['manufactures'], 'search'=>$_GET['search']])?></li>
<?php endforeach; ?>
</ul>