<?php

use himiklab\ipgeobase\IpGeoBase;
$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$checking = $news->img_url;


?>
<!--    <section class="main-container">-->
<!--        <div class="offers_page_view">-->
<!--            <div class="news__date-add"><b>Дата добавления: </b>--><? //= date('d.m.Y G:i', $model->dt_add) ?><!--</div>-->
<!--            <h1>--><? //= $model->title ?><!--</h1>-->
<!---->
<!--            <div class="offers__news-list">-->
<!--                <div class="offers__descr"><b>Описание: </b>--><? //= $model->description ?><!--</div>-->
<!--                --><?php
//                //$news->img_url;
//                if ($model->img_url != ''):
?>
<!--                    <img class="offers__image" src="--><? //= $model->img_url ?><!--" alt="">-->
<!--                --><?php //endif; ?>
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </section>-->
<?php /*
$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB()
*/
?>








<!--AKD47 section-->

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

<section class="offers_container">
<h3 class="offers_header">Комплексная химчистка салона автомобиля в сети сервисных центров “На колесах.ru”</h3>
    <div class="offers_page_view">


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



        <div class="offers_nav">
            <ul class="nav_sm nav nav-tabs">
                <li><a href="#conditions" role="tab" data-toggle="tab">Условия</a></li>
                <li><a href="#description" role="tab" data-toggle="tab">Описание</a></li>
                <li><a href="#reviews" role="tab" data-toggle="tab">Отзывы (125)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="conditions">
                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
                            perspiciatis
                            unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                            aperiam,
                            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur
                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                            dolorem
                            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                            tempora
                            incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

                        <p class="offers_content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
                            perspiciatis
                            unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                            aperiam,
                            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur
                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                            dolorem
                            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                            tempora
                            incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

                    </div>


                    <span class="question"><a class="ask" href="#">Задать вопрос</a></span>


                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="description">
                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content"></p>

                    </div>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="reviews">

                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content"><span>Задайте вопрос или оставьте комментарий</span><br/>
                            <span>Чтобы оставлять комментарии, Вам нужно подтвердить e-mail.<br/>
                            Письмо с ссылкой подтверждения должно прийти сразу после регистрации <a href="#">на
                                    указанный Вами e-mail.</a></span></p>


                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>



                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>



                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>



                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>



                </div>

            </div>

        </div>


    </div></div>


    <div class="sidebar_right">

        <div class="offers_price">
            <p>2500 руб</p>
        </div>

        <div class="offers_discount">

            <div class="offers_discount__interest">
                 <p>Скидка</p>
                <p>30%</p>
            </div>

            <div class="offers_discount__price">
                <p>1500 руб</p>
            </div>

        </div>

        <div class="offers_agreement">
            <div class="offers_agreement--count">
            <p>2</p>
            </div>
            <div class="offers_agreement--text">
            <p><a href="#">Я приеду</a></p>
            </div>
        </div>

        <div class="offers_agreement--future">
            <div class="offers_agreement--count">
                <p>5</p>
            </div>
            <div class="offers_agreement--text">
                <p><a href="#">Возможно приеду</p>
            </div>
        </div>

        <div class="footer__social">
            <a href="#" class="footer__social--link">
                <span>В</span>
                <i class="fa fa-heart"></i>

            </a>

            <span class="footer__social--link--counter">+1</span>

            <a href="#" class="footer__social--link--fb">
               <span class="fbook">f</span>
                <p>Нравится</p>
            </a>

            <span class="footer__social--link--counter">0</span>

        </div>

        <div class="offers_address">

            <h3>На колесах.ru</h3>

            <i class="fa fa-compass"></i>
            <a class="offers_website" href="#">Посмотрите сайт</a>

            <div class="map-wrap">
                <div id="map_canvas"></div>
            </div>

            <div class="offers_address--icons">

                <img class="metro" src="../../media/img/metro.png">
            </div>

            <div class="offers_address--text">
                <p>г.Москва, ул. Адмирала Лазарева, д.2 (ТЦ "Виктория", эт.2) Бульвар адмирала Ушакова. <br/>
                    <a href="#">Посмотреть
                        на карте</a></p>
            </div>

            <div class="offers_address--icons">

                <i class="fa fa-phone"></i>
            </div>

            <div class="offers_address--text">
                <p>Телефон:<br/>
                    +7 (499) 793-09-18</p>
            </div>

            <div class="offers_address--icons">

                <i class="fa fa-clock-o"></i>
            </div>

            <div class="offers_address--text">
                <p>Время работы: <br/>
                 круглосуточно и ежедневно (технический перерыв с 6:00 до 9:00)</p>
            </div>

        </div>

        <span class="question" style="margin-left: 75px;"><a class="ask" href="#">Все адреса</a></span>

    </div>

</section>




