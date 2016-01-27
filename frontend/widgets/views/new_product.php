<div class="contain">
    <?php if(!empty($product)):?>
        <h2><?= $title; ?></h2>
        <?php
        foreach ($product as $prod): ?>
            <div class="FleaMarketProductNewProduct__wr">
                <a href="/flea_market/default/view?id=<?=$prod->id;?>">
                    <div class="imgNewProduct">
                        <img src="<?= $prod['product_img'][0]->img; ?>" alt="">
                    </div>
                    <div class="nameProduct">
                        <?= $prod->name; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>