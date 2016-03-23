<section class="ads">

    <div class="ads__wrap favoritesListAjax">

        <?php if(!empty($product)):?>

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
        <?php else:?>
            В избранном нет объявлений
        <?php endif; ?>
    </div>

</section>