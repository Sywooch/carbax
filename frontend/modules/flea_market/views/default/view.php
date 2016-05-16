<?php
use common\classes\Debug;
use common\models\db\AwpBodyType;
use common\models\db\AwpDrive;
use common\models\db\AwpTransmission;
use common\models\db\AwpTypeMotor;
use common\models\db\GeobaseCity;
use common\models\db\Services;
use common\models\db\User;
use frontend\modules\flea_market\widgets\SimilarAds;
use frontend\widgets\AddReviews;
use frontend\widgets\FleaMarketMostViewed;
use frontend\widgets\FleaMarketNewProduct;
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\ShowReviews;
use yii\helpers\Html;

$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);

$this->title = $product->name . ' | ' . $city->name . ' | CARBAX все автоуслуги Вашего города';

$this->params['breadcrumbs'][] = ['label' => 'продажа авто и запчастей', 'url' => ['/flea-market/search', 'prod_type'=>'','search'=>'','region'=>'']];
$this->params['breadcrumbs'][] = $product->name;


$this->registerMetaTag([
    'name' => 'description',
    'content' => $product->descr,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $product->name . ' ' . $city->name . ',продам ' . $product->name . ' ' . $city->name . ' запчасти CARBAX, купить carbax, карбакс' ,
]);

//Debug::prn($product);

//echo FleaMarketSearch::widget(['title'=>false]);?>
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

<?php
if ($product->published != 1) {
    //Debug::prn(User::getRoleName());
    if (User::getRoleName() == 'admin' || User::getRoleName() == 'root' || Yii::$app->user->id == $product->user_id) { ?>
        <div class="fleamarket__headProductTop">

            <div class="fleamarket__cat_city">
                Все объявления
                в <?= Html::a($city->name, ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '']) ?>
                /
                <?php if ($product->prod_type == 1): ?>
                    <?= Html::a('Транспорт', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 2]) ?>
                <?php endif; ?>
                <?php if ($product->prod_type == 0): ?>
                    <?= Html::a('Запчасти', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 1]); ?>
                <?php endif; ?>
                <?php if ($product->prod_type == 2): ?>
                    <?= Html::a('Шины', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 3]); ?>
                <?php endif; ?>
                <?php if ($product->prod_type == 3): ?>
                    <?= Html::a('Диски', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 4]); ?>
                <?php endif; ?>

            </div>
            <div class="fleamarket__views_product">
                Просмотров: <span><?= $product->views; ?></span>
            </div>
        </div>
        <section class="fleamarket__wrap_view">
            <div class="contain_wr">
                <div class="fleamarket__head">
                    <h1><?= $product->name; ?>
                        <?php if ($product->prod_type == 0 || $product->prod_type == 1): ?>
                            <span> (<?= $auto->brand_name; ?>, <?= $auto->model_name; ?>)</span>
                        <?php endif; ?>
                    </h1>

                    <div class="fleamarket__created">Размещено <?= date('d.m.y в H:i:s', $product->dt_add); ?></div>
                    <?php if ($product->user_id == Yii::$app->user->id): ?>
                        <span class="operationsAd">
                                <?php
                                    $linkOption = ['/flea_market/default/edit_product', 'id' => $product->id];
                                    if($product->prod_type != 1){
                                        $linkOption['type'] = 'zap';
                                    }
                                ?>
                                <?= Html::a('Редактировать', $linkOption) ?>
                            ,</a> <a href="#">закрыть,</a> <a href="#">поднять</a> объявление
                </span>
                    <?php endif; ?>
                </div>


                <div id="page" class="inner layout-1col">
                    <!-- Start photosgallery-vertical -->
                    <div class="sliderkit photosgallery-vertical">
                        <div class="sliderkit-nav">
                            <div class="sliderkit-nav-clip">
                                <ul>
                                    <?php foreach ($images as $img):?>
                                        <li><a href="#"><img src="/<?= $img->img;?>" /></a></li>
                                        <!--<li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request2.png" alt="[Alternative text]" /></a></li>
                                        <li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request1.png" alt="[Alternative text]" /></a></li>
                                        <li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request2.png" alt="[Alternative text]" /></a></li>
                                        <li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request1.png" alt="[Alternative text]" /></a></li>
                                        <li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request2.png" alt="[Alternative text]" /></a></li>
                                        <li><a href="#" rel="nofollow" title="[link title]"><img src="/media/img/request1.png" alt="[Alternative text]" /></a></li>-->
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous</span></a></div>
                            <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next</span></a></div>
                        </div>
                        <div class="sliderkit-panels">
                            <?php foreach ($images as $img):?>
                                <div class="sliderkit-panel">
                                    <a href="/<?= $img->img;?>" rel="lightbox"><img src="/<?= $img->img;?>" /></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                    <!-- // end of photosgallery-vertical -->

                <div class="offers_nav">
                    <ul class="nav_sm nav nav-tabs">
                        <li><a href="#conditions" role="tab" data-toggle="tab">Информация</a></li>
                        <li><a href="#reviews" role="tab" data-toggle="tab">Коментарии (<?= $countReviews; ?>)</a></li>
                    </ul>
                </div>
                <div class="cleared"></div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="conditions">
                        <div class="fleamarketInfoProduct">
                            <div class="price">
                                Цена
                                <span><?= $product->price; ?> руб.</span>
                            </div>
                            <?php
                            if ($product->service_id > 0) {
                                ?>
                                <div class="fleamarket__company">
                                    Компания
                            <span><a href="<?= \yii\helpers\Url::to(['/services/services/view_service','service_id' => $product->service_id]);?>"><?= Services::find()->where(['id' => $product->service_id])->one()->name ?></a>
                                <span class="fleamarket__onCarbax">на Carbax c 14 октября 2015</span></span>
                                </div>
                            <?php } ?>
                            <div class="fleamarket__contact_person">
                                Контактное лицо
                                    <?php if(Yii::$app->user->id):?>
                                    <a href="profile/default/view?id=<?= $product->user_id ?>"><span><?= User::find()->where(['id' => $product->user_id])->one()->username ?></span></a>
                                    <?php else:?>
                                    <span><?= User::find()->where(['id' => $product->user_id])->one()->username ?></span>
                                    <?php endif;?>

                                <div class="fleamarket__user_contact">
                                <span class="fleamarket__user_tel"
                                      data-phone="<?= $product->id; ?>">Показать телефон</span>
                                        <a href="/message/default/send_message?from=<?= $product->user_id; ?>"><span
                                                class="fleamarket__user_mes">Написать сообщение</span></a>
                                <span
                                class="info">Пожалуйста, скажите продавцу, что вы нашли это объявление на Carbax </span>
                                </div>
                            </div>
                            <div class="fleamarket__city">
                                Город <span><?= $city->name ?></span>
                            </div>
                            <?php
                            if ($product->category_id != '0'):
                                ?>
                                <div class="fleamarket__type_product">
                                    Вид товара: <?= $category; ?>
                                </div>
                            <?php endif; ?>
                            <div class="fleamarket_product_description">
                                <?= $product->descr; ?>
                            </div>
                            <div class="fleaMarketInfoProductAuto">
                                <?php if ($product->prod_type == 0 || $product->prod_type == 1) {
                                    ?>
                                    <span>Марка: <?= $auto->brand_name; ?></span><br/>
                                    <span>Модель: <?= $auto->model_name; ?></span><br/>
                                    <span>Модификация: <?= $auto->type_name; ?></span><br/>
                                    <?php if (!empty($auto->year)): ?>
                                        <span>Год выпуска: <?= $auto->year; ?></span><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($autoParams->body_type)): ?>
                                        <span>Типе кузова: <?= AwpBodyType::findOne($autoParams->body_type)->name; ?></span>
                                        <br/>
                                    <?php endif; ?>

                                    <?php if (!empty($autoParams->run)): ?>
                                        <span>Пробег тыс.км.: <?= $autoParams->run; ?></span><br/>
                                    <?php endif; ?>

                                    <?php if (!empty($autoParams->transmission)): ?>
                                        <span>Коробка передач: <?= AwpTransmission::findOne($autoParams->transmission)->name; ?></span>
                                        <br/>
                                    <?php endif; ?>

                                    <?php if (!empty($autoParams->type_motor)): ?>
                                        <span>Двигатель: <?= AwpTypeMotor::findOne($autoParams->type_motor)->name; ?></span>
                                        <br/>
                                    <?php endif; ?>

                                    <?php if (!empty($autoParams->size_motor)): ?>
                                        <span>Объем двигателя: <?= $autoParams->size_motor; ?></span><br/>
                                    <?php endif; ?>

                                    <?php if (!empty($autoParams->drive)): ?>
                                        <span>Привод: <?= AwpDrive::findOne($autoParams->drive)->name; ?></span><br/>
                                    <?php endif; ?>
                                    <?php
                                }
                                if ($product->prod_type == 2) {
                                    ?>
                                    <span>Диаметр: <?= $auto->diameter; ?></span><br/>
                                    <span>Сезонность: <?= $auto->seasonality_name; ?></span><br/>
                                    <span>Ширина профиля: <?= $auto->section_width; ?></span><br/>
                                    <span>Высота профиля: <?= $auto->section_height; ?></span>
                                    <?php
                                }
                                if ($product->prod_type == 3) {
                                    ?>
                                    <span>Тип диска: <?= $auto->type_disk_name; ?></span><br/>
                                    <span>Диаметр: <?= $auto->diameter; ?></span><br/>
                                    <span>Ширина обода: <?= $auto->rim_width; ?></span><br/>
                                    <span>Количество отверстий: <?= $auto->number_holes; ?></span><br/>
                                    <span>Диаметр расположения отверстий: <?= $auto->diameter_holest; ?></span><br/>
                                    <span>Вылет (ET): <?= $auto->sortie; ?></span>
                                    <?php
                                }
                                ?>


                            </div>

                            <div class="fleamarket__number_ads">
                                Номер объявления:<?= $product->id; ?>
                            </div>

                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="reviews">

                        <div class="offers_condition_view">
                            <div class="row">
                                <?= AddReviews::widget(['spirit'=>'flea_market','id'=>$_GET['id']]); ?>
                                <?= ShowReviews::widget(['spirit'=>'flea_market','id'=>$_GET['id']]); ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="fleamarket__footer">
                <a href="/message/default/send_message?from=<?= $product->user_id; ?>" class="write_seller">Написать
                    продавцу</a>
                <?= Html::a('Пожаловаться', ['/complaint/default/add', 'id' => $product->id, 'type' => 'market'], ['class' => 'complain_products']) ?>
                <a href="#" class="favorites_products <?= (!empty($favorites)) ? 'del_favorites' : ''; ?>"
                   product_id="<?= $_GET['id']; ?>"> <?= (!empty($favorites)) ? 'Из избранного' : 'В избранное'; ?></a>
                <!--<a href="#" class="share_products">Поделиться</a>-->

                <div class="fleamarket__socseti">
                    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
                </div>
            </div>
            <?/*= SimilarAds::widget(['id' => $product->id, 'catid' => $product->category_id]); */?>
        </section>
    <?php } else {
        ?>
        <section class="fleamarket__wrap_view">
            <div class="contain_wr">
                <span>Объявление закрыто</span>
            </div>
        </section>
        <?php

    }
} else {
    ?>

    <div class="fleamarket__headProductTop">

        <div class="fleamarket__cat_city">
            Все объявления
            в <?= Html::a($city->name, ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '']) ?>
            /
            <?php if ($product->prod_type == 1): ?>
                <?= Html::a('Транспорт', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 2]) ?>
            <?php endif; ?>
            <?php if ($product->prod_type == 0): ?>
                <?= Html::a('Запчасти', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 1]); ?>
            <?php endif; ?>
            <?php if ($product->prod_type == 2): ?>
                <?= Html::a('Шины', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 3]); ?>
            <?php endif; ?>
            <?php if ($product->prod_type == 3): ?>
                <?= Html::a('Диски', ['search', 'region' => $product->region_id, 'citySearch' => $product->city_id, 'search' => '', 'prod_type' => 4]); ?>
            <?php endif; ?>

        </div>
        <div class="fleamarket__views_product">
            Просмотров: <span><?= $product->views; ?></span>
        </div>
    </div>
    <section class="fleamarket__wrap_view">
        <div class="contain_wr">
            <div class="fleamarket__head">
                <h1><?= $product->name; ?>
                    <?php if ($product->prod_type == 0 || $product->prod_type == 1): ?>
                        <span> (<?= $auto->brand_name; ?>, <?= $auto->model_name; ?>)</span>
                    <?php endif; ?>
                </h1>

                <div class="fleamarket__created">Размещено <?= date('d.m.y в H:i:s', $product->dt_add); ?></div>
                <?php if ($product->user_id == Yii::$app->user->id): ?>
                    <span class="operationsAd">
                    <a href="/flea_market/default/edit_product?id=<?= $product->id; ?>">Редактировать,</a> <a href="#">закрыть,</a> <a
                            href="#">поднять</a> объявление
                </span>
                <?php endif; ?>
            </div>

            <div id="page" class="inner layout-1col">
                <!-- Start photosgallery-vertical -->
                <div class="sliderkit photosgallery-vertical">
                    <div class="sliderkit-nav">
                        <div class="sliderkit-nav-clip">
                            <ul>
                                <?php foreach ($images as $img):?>
                                    <li><a href="#" ><img src="/<?= $img->img;?>" /></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous</span></a></div>
                        <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next</span></a></div>
                    </div>
                    <div class="sliderkit-panels">
                             <?php foreach ($images as $img):?>
                                 <div class="sliderkit-panel">
                                     <img src="/<?= $img->img;?>" />
                                 </div>
                             <?php endforeach; ?>
                    </div>
                </div>
            </div>
                <!-- // end of photosgallery-vertical -->

            <div class="offers_nav">
                <ul class="nav_sm nav nav-tabs">
                    <li><a href="#conditions" role="tab" data-toggle="tab">Информация</a></li>
                    <li><a href="#reviews" role="tab" data-toggle="tab">Коментарии (<?= $countReviews; ?>)</a></li>
                </ul>
            </div>
            <div class="cleared"></div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="conditions">
                    <div class="fleamarketInfoProduct">
                        <div class="price">
                            Цена
                            <span><?= $product->price; ?> руб.</span>
                        </div>
                        <?php
                        if ($product->service_id > 0) {
                            ?>
                            <div class="fleamarket__company">
                                Компания
                        <span><a href="<?= \yii\helpers\Url::to(['/services/services/view_service','service_id' => $product->service_id]);?>">
                                <?php $serv = Services::find()->where(['id' => $product->service_id])->one();
                                echo $serv->name;
                                ?></a>
                            <span class="fleamarket__onCarbax">на Carbax c <?= \common\classes\Custom_function::showDate($serv->dt_add); ?></span></span>
                            </div>
                        <?php } ?>
                        <div class="fleamarket__contact_person">
                            Контактное лицо
                            <?php if(Yii::$app->user->id):?>
                                <a href="profile/default/view?id=<?= $product->user_id ?>"><span><?= User::find()->where(['id' => $product->user_id])->one()->username ?></span></a>
                            <?php else:?>
                                <span><?= User::find()->where(['id' => $product->user_id])->one()->username ?></span>
                            <?php endif;?>

                            <div class="fleamarket__user_contact">
                                <span class="fleamarket__user_tel" data-phone="<?= $product->id; ?>">Показать телефон</span>
                                <a href="/message/default/send_message?from=<?= $product->user_id; ?>"><span
                                        class="fleamarket__user_mes">Написать сообщение</span></a>
                                <span class="info">Пожалуйста, скажите продавцу, что вы нашли это объявление на Carbax </span>
                            </div>
                        </div>
                        <div class="fleamarket__city">
                            Город <span><?= $city->name ?></span>
                        </div>
                        <?php
                        if ($product->category_id != '0'):
                            ?>
                            <div class="fleamarket__type_product">
                                Вид товара: <?= $category; ?>
                            </div>
                        <?php endif; ?>
                        <div class="fleamarket_product_description">
                            <?= $product->descr; ?>
                        </div>
                        <div class="fleaMarketInfoProductAuto">
                            <?php if ($product->prod_type == 0 || $product->prod_type == 1) {
                                ?>

                                <span>Марка: <?= $auto->brand_name; ?></span><br/>
                                <span>Модель: <?= $auto->model_name; ?></span><br/>
                                <span>Модификация: <?= $auto->type_name; ?></span><br/>
                                <?php if (!empty($auto->year)): ?>
                                    <span>Год выпуска: <?= $auto->year; ?></span><br/>
                                <?php endif; ?>
                                <?php if (!empty($autoParams->body_type)): ?>
                                    <span>Типе кузова: <?= AwpBodyType::findOne($autoParams->body_type)->name; ?></span><br/>
                                <?php endif; ?>

                                <?php if (!empty($autoParams->run)): ?>
                                    <span>Пробег тыс.км.: <?= $autoParams->run; ?></span><br/>
                                <?php endif; ?>

                                <?php if (!empty($autoParams->transmission)): ?>
                                    <span>Коробка передач: <?= AwpTransmission::findOne($autoParams->transmission)->name; ?></span>
                                    <br/>
                                <?php endif; ?>

                                <?php if (!empty($autoParams->type_motor)): ?>
                                    <span>Двигатель: <?= AwpTypeMotor::findOne($autoParams->type_motor)->name; ?></span><br/>
                                <?php endif; ?>

                                <?php if (!empty($autoParams->size_motor)): ?>
                                    <span>Объем двигателя: <?= $autoParams->size_motor; ?></span><br/>
                                <?php endif; ?>

                                <?php if (!empty($autoParams->drive)): ?>
                                    <span>Привод: <?= AwpDrive::findOne($autoParams->drive)->name; ?></span><br/>
                                <?php endif; ?>
                                <?php
                            }
                            if ($product->prod_type == 2) {
                                ?>
                                <span>Диаметр: <?= $auto->diameter; ?></span><br/>
                                <span>Сезонность: <?= $auto->seasonality_name; ?></span><br/>
                                <span>Ширина профиля: <?= $auto->section_width; ?></span><br/>
                                <span>Высота профиля: <?= $auto->section_height; ?></span>
                                <?php
                            }
                            if ($product->prod_type == 3) {
                                ?>
                                <span>Тип диска: <?= $auto->type_disk_name; ?></span><br/>
                                <span>Диаметр: <?= $auto->diameter; ?></span><br/>
                                <span>Ширина обода: <?= $auto->rim_width; ?></span><br/>
                                <span>Количество отверстий: <?= $auto->number_holes; ?></span><br/>
                                <span>Диаметр расположения отверстий: <?= $auto->diameter_holest; ?></span><br/>
                                <span>Вылет (ET): <?= $auto->sortie; ?></span>
                                <?php
                            }
                            ?>


                        </div>

                        <div class="fleamarket__number_ads">
                            Номер объявления:<?= $product->id; ?>
                        </div>

                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="reviews">

                    <div class="offers_condition_view">
                        <div class="row">
                            <?= AddReviews::widget(['spirit'=>'flea_market','id'=>$_GET['id']]); ?>
                            <?= ShowReviews::widget(['spirit'=>'flea_market','id'=>$_GET['id']]); ?>

                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="fleamarket__footer">
            <a href="/message/default/send_message?from=<?= $product->user_id; ?>" class="write_seller">Написать
                продавцу</a>
            <?= Html::a('Пожаловаться', ['/complaint/default/add', 'id' => $product->id, 'type' => 'market'], ['class' => 'complain_products']) ?>
            <a href="#" class="favorites_products <?= (!empty($favorites)) ? 'del_favorites' : ''; ?>"
               product_id="<?= $_GET['id']; ?>"> <?= (!empty($favorites)) ? 'Из избранного' : 'В избранное'; ?></a>
            <!--<a href="#" class="share_products">Поделиться</a>-->

            <div class="fleamarket__socseti">

                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
            </div>
        </div>
        <div class="adsWr">
            <?= SimilarAds::widget(['id' => $product->id, 'catid' => $product->category_id]); ?>
            <?= FleaMarketNewProduct::widget(); ?>
            <?= FleaMarketMostViewed::widget(); ?>
        </div>
    </section>
    <?php
}

?>