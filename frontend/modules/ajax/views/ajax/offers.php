<?php
?>

<?php use yii\helpers\Url;

foreach($offers as $offer):?>
    <div class="deals__item">
        <div class="deals__block">
            <div class="deals__block-sale">-<?= $offer['discount'] ?>%</div>
            <div class="deals__block-img">
                <img src="<?= Url::base().$offer['offers_images'][0]->images ?>" alt="">
                <div class="deals__block-img-more">
                    <p><?= substr($offer['description'],0, 68);?></p>
                    <!--<p>Время продаж ограниченно</p>-->
                    <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id'], 'slug' => $offer['slug']])?>">Подробнее</a>
                </div>
            </div>
            <div class="deals__block-desc">
                <p><?= $offer['title']; ?></p>
                <div class="deals__block-desc-price">
                    <div class="deals__block-desc-price_old">
                        <p><strike><?= $offer['old_price'] ?>руб.</strike></p>
                    </div>
                    <div class="deals__block-desc-price_new">
                        <p><?= $offer['new_price'] ?>руб.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

