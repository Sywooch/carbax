<?php

use common\classes\Custom_function;
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\BcbBrands;
use common\models\db\TofManufacturers;
use frontend\modules\services\widgets\PrintAdditionalFieldsByServisId;
use frontend\widgets\AddReviews;
use frontend\widgets\AutoType;
use frontend\widgets\ShowReviews;
use yii\helpers\Html;

$this->title = $serviceName;
$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);
$this->registerCssFile('/css/bootstrap_btn.min.css');

    $this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
    $this->params['breadcrumbs'][] = ['label' => 'Выбор сервиса', 'url' => ['/select_service']];

    $this->params['breadcrumbs'][] = ['label' => $serviceType->name, 'url' => ['/services/services/my_services', 'service_id' => $serviceType->id]];
    $this->params['breadcrumbs'][] = $this->title;

//Debug::prn($servic);

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
    <h3><?=$serviceName;?></h3>

    <div id="page" class="inner layout-1col">
        <div id="content">


            <!-- Start photosgallery-captions -->
            <div class="sliderkit photosgallery-captions">
                <div class="sliderkit-nav">
                    <div class="sliderkit-nav-clip">
                        <ul>
                            <?php foreach($img as $i): ?>
                            <li><a href="#"><img class="slidkit-nav-img" src="/<?= $i->images; ?>"/></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev">
                        <a rel="nofollow" href="#" title="Previous photo"><span>Previous photo</span></a>
                    </div>
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next">
                        <a rel="nofollow" href="#" title="Next photo"><span>Next photo</span></a>
                    </div>
                </div>
                <div class="sliderkit-panels">
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev">
                        <a rel="nofollow" href="#" title="Previous"><span>Previous</span></a>
                    </div>
                    <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next">
                        <a rel="nofollow" href="#" title="Next"><span>Next</span></a>
                    </div>

                    <?php foreach($img as $i): ?>
                        <div class="sliderkit-panel">
                            <img src="/<?= $i->images; ?>" />
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- // end of photosgallery-captions -->
            </div>
        </div>
    </div>

    <div class="singleContent__desc">
        <h3>Адреса</h3>
        <?php foreach($address as $ad): ?>
            <div class="singleContent__worksWith-block">
                <p><span class="addAddreToMapServicesView" service_type_id="<?= $serviceType->id;?>"><?=$ad->address;?></span><br></p>
            </div>

        <?php endforeach; ?>
    </div>

    <div class="singleContent__map">
        <div id="map" style="width: 100%; height: 100%"></div>
    </div>

    <div class="offers_nav">
        <ul class="nav_sm nav nav-tabs">
            <li><a href="#conditions" role="tab" data-toggle="tab">О нас</a></li>
            <li><a href="#reviews" role="tab" data-toggle="tab">Отзывы (<?= $countReviews; ?>)</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="conditions">
            <div class="singleContent__desc">
                <h3>О нас</h3>

                <p>
                    <?=$description;?>
                </p>
            </div>

            <div class="singleContent__desc">
                <h3>График работы</h3>
                <p>
                    <?php
                    $custFunc = new Custom_function();
                    foreach($workHours as $wh):
                        ?>
                        <span><?= $custFunc->get_week_day($wh->day); ?></span>
                        <?php
                        if($wh->{'24h'} == 1){ ?>
                            Круглосуточно
                            <?php
                        }
                        else{
                            ?>
                            С <?=$wh->hours_from?> ДО <?=$wh->hours_to?>

                        <?php } ?>
                        <br />
                    <?php endforeach; ?>

                </p>
            </div>

            <!-- <div class="singleContent__desc">
                 <h3>Обслуживаем:</h3>
                 <img class="car__logo" src="/frontend/web/media/img/mitsubishi.png" alt=""/>
                 <img class="car__logo" src="/frontend/web/media/img/lexus.png" alt=""/>
                 <img class="car__logo" src="/frontend/web/media/img/honda.png" alt=""/>
             </div>-->

            <div class="singleContent__desc">
                <?php
                echo PrintAdditionalFieldsByServisId::widget(['servicId'=>$serviceID])
                ?>
            </div>

            <!--<div class="singleContent__desc--payment">
                <h3>Кредит: <span>есть</span></h3>
                <h3>Тест-драйв: <span>есть</span></h3>
                <h3>Принимаем: <span>частное лицо</span></h3>
            </div>-->

            <div class="singleContent__desc">
                <h3>Зоны комфорта</h3>
                <div class="singleContent__worksWith-blockWR">
                    <?php foreach($comfortZone as $cz):?>
                        <div class="comfortZoneWR">
                            <img src="<?=$cz->img_ulr;?>"><span><?=$cz->name;?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="singleContent__worksWith">
                <h3>Работаем с:</h3>

                <?php foreach($autoType as $at):?>
                    <div class="singleContent__worksWith-block">

                        <h4><?=$at->name?></h4>
                        <img src="<?=$at->img_url;?>" alt="">
                    </div>

                <?php endforeach;?>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="reviews">

            <div class="offers_condition_view">
                <div class="row">
                    <?= AddReviews::widget(['spirit'=>'service','id'=>$_GET['service_id']]); ?>
                    <?= ShowReviews::widget(['spirit'=>'service','id'=>$_GET['service_id']]); ?>

                </div>
            </div>
        </div>
    </div>



        <div class="cleared"></div>
        <div class="fleamarket__footer">
            <a href="/message/default/send_message?from=<?= $servic->user_id; ?>" class="write_seller">Написать владельцу</a>
            <?= Html::a('Пожаловаться', ['/complaint/default/add', 'id' => $servic->id, 'type' => 'service'], ['class' => 'complain_products']) ?>
            <a href="#" class="favorites_service <?= (!empty($favorites)) ? 'del_favorites_service' : ''; ?>"
               service_id="<?= $_GET['service_id']; ?>"> <?= (!empty($favorites)) ? 'Из избранного' : 'В избранное'; ?></a>

            <!--<a href="#" class="share_products">Поделиться</a>-->

            <div class="fleamarket__socseti">
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
            </div>
        </div>


    <?= \frontend\modules\services\widgets\ShowOffersByService::widget(['serviceId' => $_GET['service_id']]); ?>


</section>
