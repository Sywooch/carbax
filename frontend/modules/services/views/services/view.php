<?php

use common\classes\Custom_function;
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\BcbBrands;
use common\models\db\TofManufacturers;
use frontend\modules\services\widgets\PrintAdditionalFieldsByServisId;
use frontend\widgets\AutoType;
use yii\helpers\Html;

$this->title = $serviceName;
$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);
$this->registerCssFile('/css/bootstrap_btn.min.css');

    $this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
    $this->params['breadcrumbs'][] = ['label' => 'Выбор сервиса', 'url' => ['/select_service']];

    $this->params['breadcrumbs'][] = ['label' => $serviceType->name, 'url' => ['/services/services/my_services', 'service_id' => $serviceType->id]];
    $this->params['breadcrumbs'][] = $this->title;

//Debug::prn($serviceType);

?>
<!--AKD47 section-->

<script type="text/javascript">
    jQuery(window).load(function(){ //jQuery(window).load() must be used instead of jQuery(document).ready() because of Webkit compatibility

        // Photo gallery > With captions
        jQuery(".photosgallery-captions").sliderkit({
            circular:true,
            mousewheel:true,
            keyboard:true,
            shownavitems:4,
            panelbtnshover:false,
            auto:false,
            fastchange:false
        });

    });
</script>


<section class="main-container">
    <h3>ООО Автосервис «Шинка»</h3>

    <div id="page" class="inner layout-1col">
        <div id="content">


            <!-- Start photosgallery-captions -->
            <div class="sliderkit photosgallery-captions">
                <div class="sliderkit-nav">
                    <div class="sliderkit-nav-clip">
                        <ul>
                            <li><a href="#" rel="nofollow" title="[link title]"><img class="slidkit-nav-img"
                                                                                     src="/frontend/web/media/img/avtosalon.png"
                                                                                     alt="[Alternative text]"/></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img class="slidkit-nav-img"
                                                                                     src="/frontend/web/media/img/autosalon2.png"
                                                                                     alt="[Alternative text]"/></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img class="slidkit-nav-img"
                                                                                     src="/frontend/web/media/img/autosalon2.png"
                                                                                     alt="[Alternative text]"/></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img class="slidkit-nav-img"
                                                                                     src="/frontend/web/media/img/autosalon2.png"
                                                                                     alt="[Alternative text]"/></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img class="slidkit-nav-img"
                                                                                     src="/frontend/web/media/img/autosalon2.png"
                                                                                     alt="[Alternative text]"/></a></li>
                        </ul>
                    </div>
                    <!--                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous line</span></a></div>-->
                    <!--                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next line</span></a></div>-->
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#"
                                                                                     title="Previous photo"><span>Previous photo</span></a>
                    </div>
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#"
                                                                                     title="Next photo"><span>Next photo</span></a>
                    </div>
                </div>
                <div class="sliderkit-panels">
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#"
                                                                                     title="Previous"><span>Previous</span></a>
                    </div>
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#"
                                                                                     title="Next"><span>Next</span></a>
                    </div>

                    <div class="sliderkit-panel">
                        <img src="/frontend/web/media/img/avtosalon.png" alt="[Alternative text]"/>

                    </div>
                    <div class="sliderkit-panel">
                        <img src="/frontend/web/media/img/autosalon2.png" alt="[Alternative text]"/>

                    </div>
                    <div class="sliderkit-panel">
                        <img src="/frontend/web/media/img/autosalon2.png" alt="[Alternative text]"/>

                    </div>
                    <div class="sliderkit-panel">
                        <img src="/frontend/web/media/img/autosalon2.png" alt="[Alternative text]"/>

                    </div>
                    <div class="sliderkit-panel">
                        <img src="/frontend/web/media/img/autosalon2.png" alt="[Alternative text]"/>
                    </div>
                </div>
                <!-- // end of photosgallery-captions -->
            </div>
        </div>
    </div>

    <div class="singleContent__desc">
        <h3>Адреса</h3>

        <div class="singleContent__worksWith-block">
            <p><span>г. Москва, ул. Уличная 7, 15</span><br>
                autotech.ru<br>
                info@autotech.ru<br>
                тел. 8 (436) 3773232</p>
        </div>
        <div class="singleContent__worksWith-block">
            <p><span>г. Москва, ул. Уличная 7, 15</span><br>
                autotech.ru<br>
                info@autotech.ru<br>
                тел. 8 (436) 3773232</p>
        </div>
        <div class="singleContent__worksWith-block">
            <p><span>г. Москва, ул. Уличная 7, 15</span><br>
                autotech.ru<br>
                info@autotech.ru<br>
                тел. 8 (436) 3773232</p>
        </div>
    </div>

    <div class="filter__map">
        <span id="setAddress"></span>
        <span id="coordinates" lat="55.419441" lng="38.27673" cityid="760" regionid="39"></span>

        <div id="main_map" style="width:100%; height:100%"></div>
    </div>


    <div class="singleContent__desc">
        <h3>О нас</h3>

        <p>
            Здравствуйте! Мы компания ООО «Автосервис-сток» мы крутые, очень крутые круче нас нет никого, только мы
            самые
            крутые, если кто-то говорит, что он круче нас не верьте, ему он врет, а если и не врет то значит его тоже
            прет,
            так вот, если вы хотите чтобы у вас с машиной было все супер, не надо ходить к другим, просто приезжайте к
            нам и вы все поймете.
        </p>
    </div>

    <div class="singleContent__desc">
        <h3>Дни работы</h3>

        <p>
            <span>ПН  - ПТ</span> с 9:00 до 21:00,  <span>СБ</span> с 9:00 до 20:00,  <span>ВС</span> выходной
        </p>
    </div>

    <div class="singleContent__desc">
        <h3>Обслуживаем:</h3>
        <img class="car__logo" src="/frontend/web/media/img/mitsubishi.png" alt=""/>
        <img class="car__logo" src="/frontend/web/media/img/lexus.png" alt=""/>
        <img class="car__logo" src="/frontend/web/media/img/honda.png" alt=""/>
    </div>

    <div class="singleContent__desc">
        <h3>Услуги:</h3>

        <div class="singleContent__worksWith-block">
            <p>Ремонт и диагностика МКПП</p>

            <p>Ремонт выхлопных систем</p>

            <p>Ремонт гидроусилителя руля</p>

            <p>Ремонт и диагностика МКПП</p>

            <p>Ремонт выхлопных систем</p>

            <p>Ремонт гидроусилителя руля</p>
        </div>
        <div class="singleContent__worksWith-block">
            <p>Ремонт и диагностика МКПП</p>

            <p>Ремонт выхлопных систем</p>

            <p>Ремонт гидроусилителя руля</p>

            <p>Ремонт и диагностика МКПП</p>

            <p>Ремонт выхлопных систем</p>

            <p>Ремонт гидроусилителя руля</p>
        </div>

    </div>

    <div class="singleContent__desc--payment">
        <h3>Кредит: <span>есть</span></h3>
        <h3>Тест-драйв: <span>есть</span></h3>
        <h3>Принимаем: <span>частное лицо</span></h3>
    </div>

    <div class="singleContent__desc">
        <h3>Зоны комфорта</h3>

        <div class="singleContent__worksWith-block">

            <div class="comfortZone">
                <img src="/frontend/web/media/img/wc-1.png"><span>Туалет</span>
            </div>

            <div class="comfortZone">
                <img src="/frontend/web/media/img/wifi-1.png">
            </div>

            <div class="comfortZone">
                <img src="/frontend/web/media/img/shiny.png">
            </div>

        </div>
        <div class="singleContent__worksWith-block">

            <div class="comfortZone">
                <img src="/frontend/web/media/img/coffemachine.png">
            </div>

            <div class="comfortZone">
                <img src="/frontend/web/media/img/payment.png">
            </div>

            <div class="comfortZone">
                <img src="/frontend/web/media/img/terminal.png">
            </div>

        </div>

    </div>



</section>
<!--AKD47 section end-->



<section class="main-container">
            <h3>Название автосервиса:</h3><?=$serviceName;?>
            <div class="logoService">
            <?php
                if(!empty($serviceLogo)){
                    echo Html::img('/'.$serviceLogo,['width'=>'100px','alt'=>$serviceName]);
                }
            ?>
            </div>
            <div class="singleContent__desc">
                <h3>Описание</h3>
                    <div>
                        <?=$description;?>
                    </div>
                <h3>Адрес</h3>
                <div class="serviceAddress">
                    <?php
                        foreach($address as $ad){
                            ?>
                            <div class="address"><?=$ad->address;?></div>
                        <?php
                        }
                    ?>
                </div>
                <h3>Время работы</h3>
                <div>
                    <?php
                        $custFunc = new Custom_function();
                        foreach($workHours as $wh):

                    ?>
                        <div>
                            <span><?=$custFunc->get_week_day($wh->day)?></span> - <?php
                            if($wh->{'24h'} == 1){ ?>
                                Круглосуточно
                            <?php
                            }
                            else{
                                ?>
                                С <?=$wh->hours_from?> ДО <?=$wh->hours_to?>
                            <?php
                            }?>
                        </div>
                    <?php
                        endforeach;
                    ?>
                </div>
                <div class="singleContent__desc--contacts">
                    <h3>Контакты</h3>
                    <div class="singleContent__desc--line">
                        <label for="website">Web-сайт</label>
                        <?=$website?>
                    </div>
                    <div class="singleContent__desc--line">
                        <label for="phonenumber">Телефоны</label>
                        <?php
                            foreach($phone as $phon):
                        ?>
                                <div><?=$phon->number;?></div>
                        <?php
                            endforeach;
                        ?>

                    </div>
                    <div class="singleContent__desc--line">
                        <label for="mailadress">Почта</label>
                       <span><?=$email;?></span>

                    </div>
                </div>


                 <?php
                   echo PrintAdditionalFieldsByServisId::widget(['servicId'=>$serviceID])
                 ?>
               <!-- <div class="singleContent__desc--carbrands">
                    <h3>Марки автомобилей</h3>
                    <?php /*foreach($carBrands as $cb):*/?>
                        <div class="carBrands"><?/*= BcbBrands::find()->where(['id'=>$cb->brand_cars_id])->one()->name; */?></div>
                    <?php /*endforeach;*/?>
                </div>-->

                <div class="singleContent__services">
                    <div class="singleContent__services-comfort">
                        <h3>Зоны комфорта</h3>
                        <?php foreach($comfortZone as $cz):?>
                            <div class="comfortZone">
                                <img src="<?=$cz->img_ulr;?>"/><span><?=$cz->name;?></span>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>
                <?php if($serviceType->view_widget_auto_type == 1 ): ?>
                    <div class="singleContent__worksWith">
                        <h3>Работаем</h3>
                       <!-- <?php /*foreach($autoType as $at):*/?>
                            <div class="singleContent__worksWith-block">

                                <h4><?/*=$at->name*/?></h4>
                                <img src="<?/*=$at->img_url;*/?>" alt="">
                            </div>
                        --><?php /*endforeach;*/?>

                        <?= AutoType::widget(['view'=>1,'serviceId'=>$serviceID])?>
                    </div>
                <?php endif; ?>
            </div>
</section>