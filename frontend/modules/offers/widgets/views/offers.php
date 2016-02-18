<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>


</section>-->

<section class="deals">
    <div class="contain">
        <div class="deals--topline">
            <img src="/media/img/logo2.png" alt="">
            <h3 class="orange">Спецпредложения</h3>
        </div>
        <div class="deals__menu">
            <ul>
                <li><a href="#" class="deals__menu--all deals__menu--service deals__menu--active" serviceId="0">Все</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="1">Автосалон</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="4">Шины / Диски</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="6">Тюнинг</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="11">Автосервис</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="7">Автошкола</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="13">Авторазбор</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="9">Заправка</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="8">Страховка</a></li>
            </ul>
        </div>

        <div class="deals__line">
            <?php

            foreach($offers as $offer):?>
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-sale">-<?= $offer['discount'] ?>%</div>
                        <div class="deals__block-img">
                            <img src="<?= \yii\helpers\Url::base().$offer['img_url'] ?>" alt="">
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
            <?php if($count > 9):?>
                <a href="<?= Url::to(['/offers/offers/all_offers']); ?>">Все спецпредложения</a>
            <?php endif; ?>
        </div>

    </div>
</section>


<?php
    //    $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
    /*$region = Yii::$app->ipgeobase->getLocation('5.153.133.222');
    var_dump($region['region']);*/
?>