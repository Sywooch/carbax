<?php
use common\classes\Address;
?>

<?php if(!empty($product)):
    $address = Address::get_geo_info();
?>
<section class="ads">
    <div class="contain">
        <div class="search__wrap">
            <div class="search--topline">
                <a href="<?= \yii\helpers\Url::to(['/flea-market/search','prod_type'=>'','search'=>'','region'=>$address['region_id']])?>">
                    <img src="/media/img/logo2.png" alt="CARBAX">
                    <h3 class="orange"><?= $title; ?></h3>
                </a>
            </div>
        </div>
       <!-- <h2><?/*= $title; */?></h2>-->
        <div class="ads__wrap">
            <?php
            foreach ($product as $prod): ?>
                <!--<a href="<?/*= \yii\helpers\Url::to(['/flea-market/view','slug'=>$prod->slug, 'id' => $prod->id])*/?>" class="ads__item">-->
                <a href="/flea-market/view/<?= $prod->id?>/<?= $prod->slug?>" class="ads__item">
				<span class="ads__item--img">
					<img src="/<?= $prod['product_img'][0]->img; ?>" alt="<?= $prod->name; ?>">
					<span class="ads__item--rating"><?= \common\classes\Custom_function::showRating($prod->id,'flea_market')?></span>
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
