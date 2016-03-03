<?php
use common\classes\Debug;
use frontend\modules\offers\widgets\MenuOffer;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);
$this->title = (!empty($serviceType)) ? $serviceType->name : 'Все спецпредложения';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="deals all_offers">
        <?= MenuOffer::widget();?>

    <!----AKD47 section---->
    <!-- Launch Slider Kit -->
    <script type="text/javascript">
        jQuery(window).load(function(){

            // Photo gallery > Vertical
            jQuery(".photosgallery-vertical").sliderkit({
                circular:true,
                mousewheel:true,
                shownavitems:4,
                verticalnav:true,
                navclipcenter:true,
                auto:false
            });



        });
    </script>

    <div id="page" class="inner layout-1col">
        <!-- Start photosgallery-vertical -->
        <div class="sliderkit photosgallery-vertical">
            <div class="sliderkit-nav">
                <div class="sliderkit-nav-clip">
                    <ul>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                        <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                    </ul>
                </div>
                <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous</span></a></div>
                <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next</span></a></div>
            </div>
            <div class="sliderkit-panels">
                <div class="sliderkit-panel">
                    <img src="../../media/img/request1.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request2.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request1.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request2.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request1.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request2.png" alt="[Alternative text]" />

                </div>
                <div class="sliderkit-panel">
                    <img src="../../media/img/request1.png alt="[Alternative text]" />

                </div>
            </div>
        </div>
        <!-- // end of photosgallery-vertical -->

    <!----AKD47 section end---->

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


