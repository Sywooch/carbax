<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
<section class="deals">
    <div class="contain">
        <h2 class="blockTitle-left"><span class="orange">Спец</span>предложения</h2>
<?php
$i=0;
foreach($offers as $n):
                if($i==0):?>
        <div class="deals__line">
            <?php
            endif;
    $i++;
    ?>

                    <div class="deals__item">
                        <div class="deals__block">
                            <div class="deals__block-sale"><?= $n['discount'] ?></div>
                            <div class="deals__block-img">
                                <?php if($n['img_url']!=''):?>
                                <img src="<?= \yii\helpers\Url::base().$n['img_url'] ?>" alt="">
                                <?php endif ?>
                                <div class="deals__block-img-more">
                                    <p><?= $n['short_description']?></p>
                                    <a href="<?= Url::to(['/offers/offers/view', 'id' => $n['id']])?>">Подробнее</a>
                                </div>
                            </div>
                            <div class="deals__block-desc">
                                <p><?= $n['title']?></p>
                                <div class="deals__block-desc-price">
                                    <div class="deals__block-desc-price_old">
                                        <p><strike><?= $n['old_price'] ?></strike></p>
                                    </div>
                                    <div class="deals__block-desc-price_new">
                                        <p><?= $n['new_price'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            if($i==3):
            ?>
                </div>
            <?php
            $i=0;
            endif;
            ?>
    <?php
endforeach;
if($i!==3):
?>
    </div>
    <?php
    endif;
//    $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
    /*$region = Yii::$app->ipgeobase->getLocation('5.153.133.222');
    var_dump($region['region']);*/
    ?>

</section>

