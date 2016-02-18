<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
<!--<section class="deals">
    <div class="contain">
        <h2 class="blockTitle-left"><span class="orange">Спец</span>предложения</h2>
<?php
/*$i=0;

Debug::prn($offers);

foreach($offers as $n):
                if($i==0):*/?>
        <div class="deals__line">
            <?php
/*            endif;
    $i++;
    */?>

                    <div class="deals__item">
                        <div class="deals__block">
                            <div class="deals__block-sale"><?/*= $n['discount'] */?></div>
                            <div class="deals__block-img">
                                <?php /*if($n['img_url']!=''):*/?>
                                <img src="<?/*= \yii\helpers\Url::base().$n['img_url'] */?>" alt="">
                                <?php /*endif */?>
                                <div class="deals__block-img-more">
                                    <p><?/*= $n['short_description']*/?></p>
                                    <a href="<?/*= Url::to(['/offers/offers/view', 'id' => $n['id']])*/?>">Подробнее</a>
                                </div>
                            </div>
                            <div class="deals__block-desc">
                                <p><?/*= $n['title']*/?></p>
                                <div class="deals__block-desc-price">
                                    <div class="deals__block-desc-price_old">
                                        <p><strike><?/*= $n['old_price'] */?></strike></p>
                                    </div>
                                    <div class="deals__block-desc-price_new">
                                        <p><?/*= $n['new_price'] */?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
/*            if($i==3):
            */?>
                </div>
            <?php
/*            $i=0;
            endif;
            */?>
    <?php
/*endforeach;
if($i!==3):
*/?>
    </div>
    <?php
/*    endif;

    */?>

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

                <!--<li><a href="#">Шиномонтаж</a></li>
                <li><a href="#">Эвакуатор</a></li>
                <li><a href="#">Автомойка</a></li>
                <li><a href="#">Автомагазин</a></li>-->
            </ul>
        </div>

        <div class="deals__line">
            <?php foreach($offers as $offer):?>
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

        </div>

    </div>
</section>


<?php
    //    $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
    /*$region = Yii::$app->ipgeobase->getLocation('5.153.133.222');
    var_dump($region['region']);*/
?>