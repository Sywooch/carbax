<?php
$this->title = "Избранное";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="main-container">
    <div class="contain_favorites">
    <div class="fleamarket__ads--list">
    <?php foreach($product as $p):?>
        <div class="fleamarket__ads__item">
            <a href="#" class="fleamarket__ads__item--img">
                <img src="/<?=$p['product_img'][0]->img?>" alt="">

            </a>
            <div class="fleamarket__ads__item--desc">

                <a href="/flea_market/default/view?id=<?=$p->id;?>" class="fleamarket__ads__item--desc--title"><?=$p['name']?></a>
                <p class="fleamarket__ads__item--desc--price"><?=$p['price']?></p>
                <p class="fleamarket__ads__item--desc--specification"><?=$p['descr']?></p>
                <!--<small class="fleamarket__ads__item--desc--contact">Автодилер</small>-->
                <small class="fleamarket__ads__item--desc--adress"><?= $p['geobase_city']->name; ?></small>
                <small class="fleamarket__ads__item--desc--time"><?= date('Y-m-d H:i',$p['dt_add']) ?></small>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
        </div>
</section>