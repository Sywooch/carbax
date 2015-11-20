<?php
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\GetSubCategory;

?>

<?= FleaMarketSearch::widget(['title'=>false]);?>
<?= GetSubCategory::widget(['parentId'=>$_GET['categ']])?>

