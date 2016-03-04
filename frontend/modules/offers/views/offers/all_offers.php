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

            // Carousel > Continuous
            jQuery(".carousel-continuous").sliderkit({
                auto:false,
                circular:false,
                shownavitems:5,
                scroll:1,
                navcontinuous: true,
                scrollspeed: 700,
                scrolleasing: "linear"
            });

        });
    </script>

    <div id="page" class="inner layout-1col">
        <div id="content">

            <!-- Start carousel-continuous -->
            <div class="sliderkit carousel-continuous">
                <div class="sliderkit-nav">
                    <div class="sliderkit-nav-clip sliderkit-nav-carousel">
                        <ul>
                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="slidercit__deals__item">
                                    <div class="slidercit__deals__block">
                                        <div class="slidercit__deals__block-sale">-50%</div>
                                        <div class="slidercit__deals__block-img">
                                            <img
                                                src="/frontend/web/media/img/offers/1455544473starcraft-ii-heart-of-the-swarm-pc-1306827260-047.jpg"
                                                alt="">

                                            <div class="slidercit_deals__block-img-more">
                                                <p><?= $offer['short_description'] ?></p>
                                                <!--<p>Время продаж ограниченно</p>-->
                                                <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']]) ?>">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="slidercit_deals__block-desc">
                                            <p>FFF</p>

                                            <div class="slidercit__deals__block-desc-price">
                                                <div class="slidercit__deals__block-desc-price_old">
                                                    <p><strike>100руб.</strike></p>
                                                </div>
                                                <div class="slidercit__deals__block-desc-price_new">
                                                    <p>50руб.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev carousel-nav-prev"><i class="fa fa-chevron-left"><a href="#" title="Step backward"><span>Previous</span></a></i></div>
                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next carousel-nav-next"><i class="fa fa-chevron-right"><a href="#" title="Step forward"><span>Next</span></a></i></div>
                </div>
            </div>
            <!-- // end of carousel-continuous -->
        </div>
    </div>

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


