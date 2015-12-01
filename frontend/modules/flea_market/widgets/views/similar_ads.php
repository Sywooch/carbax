<?php
use common\models\db\GeobaseCity;
use common\models\db\ProductImg;
/*\common\classes\Debug::prn($product);*/
?>
<div class="fleamarket__similar_ads">
    <h4>Похожие объявления:</h4>
    <?php foreach ($product as $pr):?>
        <a href="/flea_market/default/view?id=<?=$pr->id;?>">
            <div class="fleamarket__similar_ads_product_wr">
                <img src="/<?= ProductImg::find()->where(['product_id'=>$pr->id])->one()->img;?>" alt="">
                <span class="fleamarket__similar_ads_product_name"><?=$pr->name;?></span>
                <span class="fleamarket__similar_ads_product_price"><?=$pr->price?> руб.</span>
                <span class="fleamarket__similar_ads_product_city"><?= GeobaseCity::find()->where(['id'=>$pr->city_id])->one()->name?> </span>
            </div>
        </a>
    <?php endforeach; ?>



</div>