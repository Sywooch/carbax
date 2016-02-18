<?php
use common\classes\Debug;
use frontend\modules\offers\widgets\MenuOffer;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = (!empty($serviceType)) ? $serviceType->name : 'Все спецпредложения';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="deals all_offers">
        <?= MenuOffer::widget();?>
        <div class="deals__line">
            <?php

            foreach($offers as $offer):?>
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-sale">-<?= $offer['discount'] ?>%</div>
                        <div class="deals__block-img">
                            <img src="<?= Url::base().$offer['img_url'] ?>" alt="">
                            <div class="deals__block-img-more">
                                <p><?= $offer['short_description']?></p>
                                <!--<p>Время продаж ограниченно</p>-->
                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']])?>">Подробнее</a>
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
            <div class="cleared"></div>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>


</section>


