<?php
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\GetSubCategory;

?>

<?= FleaMarketSearch::widget(['title'=>false]);?>
<?php if(!empty($_GET['categ'])): ?>
    <?= GetSubCategory::widget(['parentId'=>$_GET['categ']])?>
<?php endif; ?>
<section class="fleamarket__wrap">
    <div class="contain">
        <div class="fleamarket__ads--list">
            <?php foreach($search as $s): ?>
                <?php
                $img = \common\models\db\ProductImg::find()->where(['product_id'=>$s['id']])->one()->img;
                $count = \common\models\db\ProductImg::find()->where(['product_id'=>$s['id']])->count();
                ?>
                <div class="fleamarket__ads__item">
                    <a href="#" class="fleamarket__ads__item--img">
                        <img src="/<?=$img?>" alt="">
                        <span class="fleamarket__ads__item--img--marker"><?=$count?></span>
                    </a>
                    <div class="fleamarket__ads__item--desc">
                        <a class="fleamarket__ads__item--desc--star"></a>
                        <a href="#" class="fleamarket__ads__item--desc--title"><?=$s['name']?></a>
                        <p class="fleamarket__ads__item--desc--price"><?=$s['price']?></p>
                        <p class="fleamarket__ads__item--desc--specification"><?=$s['descr']?></p>
                        <small class="fleamarket__ads__item--desc--contact">Автодилер</small>
                        <small class="fleamarket__ads__item--desc--adress">м. Белорусская</small>
                        <small class="fleamarket__ads__item--desc--time"><?= date('Y-m-d H:i',$s['dt_add']) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>