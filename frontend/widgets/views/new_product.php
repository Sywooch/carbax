<?php if(!empty($product)):?>
<section class="ads">
    <div class="contain">
        <h2><?= $title; ?></h2>
        <div class="ads__wrap">
            <?php
            foreach ($product as $prod): ?>
                <a href="<?= \yii\helpers\Url::to(['/flea-market/view','id'=>$prod->id])?>" class="ads__item">
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
