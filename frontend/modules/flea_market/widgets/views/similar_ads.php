<?php
use common\models\db\GeobaseCity;
use common\models\db\ProductImg;
/*\common\classes\Debug::prn($product);*/
?>
<!--<div class="fleamarket__similar_ads">
    <h4>Похожие объявления:</h4>
    <?php /*foreach ($product as $pr):*/?>
        <a href="/flea_market/default/view?id=<?/*=$pr->id;*/?>">
            <div class="fleamarket__similar_ads_product_wr">
                <img src="/<?/*= ProductImg::find()->where(['product_id'=>$pr->id])->one()->img;*/?>" alt="">
                <span class="fleamarket__similar_ads_product_name"><?/*=$pr->name;*/?></span>
                <span class="fleamarket__similar_ads_product_price"><?/*=$pr->price*/?> руб.</span>
                <span class="fleamarket__similar_ads_product_city"><?/*= GeobaseCity::find()->where(['id'=>$pr->city_id])->one()->name*/?> </span>
            </div>
        </a>
    <?php /*endforeach; */?>



</div>-->

<?php if(!empty($product)):?>
    <section class="ads">
        <div class="contain">
            <h2><?= $title; ?></h2>
            <div class="ads__wrap">
                <?php
                foreach ($product as $prod): ?>
                    <a href="/flea_market/default/view?id=<?=$prod->id;?>" class="ads__item">
				<span class="ads__item--img">
					<img src="/<?= $prod['product_img'][0]->img; ?>" alt="">
					<!--<span class="ads__item--rating">4,1</span>-->
				</span>
				<span class="ads__item--title">
					<p><?= $prod->name; ?></p>
				</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>