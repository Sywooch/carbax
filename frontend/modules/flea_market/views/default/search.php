<?php
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\GetModelTypeAuto;
use frontend\widgets\GetSubCategory;
use yii\widgets\LinkPager;

?>

<?= FleaMarketSearch::widget(['title'=>false]);?>
<?php if($_GET['prod_type']-1 == 0): ?>
    <?php if(!empty($_GET['categ'])):?>
        <?= GetSubCategory::widget(['parentId'=>$_GET['categ']])?>
    <?php else: ?>
        <?= GetSubCategory::widget(['parentId'=>10001])?>
    <?php endif; ?>
<?php endif; ?>

<?php
/*    if (!empty($_GET['brandSearch'])){
        echo GetModelTypeAuto::widget(['brand' => $_GET['brandSearch'],'typeAuto' => $_GET['typeAuto'],'year' => $_GET['yearSearch'],'model'=>$_GET['modelSearch']]);
    }

    if(!empty($_GET['motoType'])){
        echo GetModelTypeAuto::widget(['typeAuto' => $_GET['typeAuto']]);
    }

*/?>
<section class="fleamarket__wrap">
    <div class="contain">
        <div class="fleamarket__ads--list">
            <?php foreach($search as $s): ?>
                <?php
               // \common\classes\Debug::prn($s->favorites[0]);
                $img = \common\models\db\ProductImg::find()->where(['product_id'=>$s['id']])->one()->img;
                $count = \common\models\db\ProductImg::find()->where(['product_id'=>$s['id']])->count();
                ?>
                <div class="fleamarket__ads__item">
                    <a href="#" class="fleamarket__ads__item--img">
                        <img src="/<?=$img?>" alt="">
                        <span class="fleamarket__ads__item--img--marker"><?=$count?></span>
                    </a>
                    <div class="fleamarket__ads__item--desc">
                        <a class="fleamarket__ads__item--desc--star <?= (!empty($s->favorites[0])) ? 'delFavorites' : '';?>" product_id="<?= $s['id']?>" title="<?= (!empty($s->favorites[0])) ? 'Убрать из избранного' : 'Добавить в избранное';?>"></a>
                        <a href="/flea_market/default/view?id=<?=$s->id;?>" class="fleamarket__ads__item--desc--title"><?=$s['name']?></a>
                        <p class="fleamarket__ads__item--desc--price"><?=$s['price']?></p>
                        <p class="fleamarket__ads__item--desc--specification"><?=$s['descr']?></p>
                        <!--<small class="fleamarket__ads__item--desc--contact">Автодилер</small>-->
                        <small class="fleamarket__ads__item--desc--adress"><?= $s['geobase_city']->name; ?></small>
                        <small class="fleamarket__ads__item--desc--time"><?= date('Y-m-d H:i',$s['dt_add']) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </div>
</section>