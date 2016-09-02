<?php foreach($product as $item): ?>
    <!-- open .home-fleamarket__item -->
    <div class="home-fleamarket__item">
        <a href="/flea-market/view/<?= $item->id?>/<?= $item->slug?>"><img src="/<?= $item['product_img'][0]->img; ?>" alt="" /></a>
        <a href="/flea-market/view/<?= $item->id?>/<?= $item->slug?>" class="home-fleamarket__item_title"><?= $item->name;?></a>
        <span class="home-fleamarket__item_price"><?= $item->price; ?> Р</span>


        <span class="home-fleamarket__item_year"><?= (!empty($item['auto_widget']->year)) ?  $item['auto_widget']->year . 'г.в.' : ''; ?> </span>
        <?php $run = $item['auto_widget_params'][0]->run; ?>
        <span class="home-fleamarket__item_mileage"><?= (!empty($run)) ? ',' . $run . 'км.' : ''; ?> </span>
    </div>
    <!-- close .home-fleamarket__item -->
<?php endforeach; ?>