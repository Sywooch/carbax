<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
    <!-- open .home-deals -->
    <section class="home-deals">
        <!-- open .home-deals__nav -->
        <!-- open .container -->
        <div class="container">
            <a href="<?= Url::to(['/offers/offers/all_offers','id'=>0]); ?>" class="home-deals__link">
                <img src="/theme/carbax/img/carbax_logo_2.png" alt="" />
                <strong>спецпредложения</strong>
            </a>
        </div>
        <!-- close .container -->

        <nav class="home-deals__nav">
            <ul>
                <li><a href="#" class="home-deals__nav_item home-deals__nav_item_active" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="0">Все</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="1">Автосалон</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="4">Шины / Диски</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="6">Тюнинг</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="11">Автосервис</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="7">Автошкола</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="13">Авторазбор</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="9">Заправка</a></li>
                <li><a href="#" class="home-deals__nav_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" serviceTypeId="10">Страховка</a></li>

            </ul>
        </nav>
        <!-- close .home-deals__nav -->

        <!-- open .home-deals__content -->
        <div class="home-deals__content">
            <!-- open .container -->
            <div class="container deals__line">
                <?php foreach($offers as $offer): ?>


                    <div class="deals__item">
                        <div class="deals__block">
                            <div class="deals__block-sale">-<?= $offer['discount'] ?>%</div>
                            <div class="deals__block-img">
                                <img src="<?= \yii\helpers\Url::base().$offer['offers_images'][0]->images ?>" alt="">
                                <div class="deals__block-img-more">
                                    <p><?= substr($offer['description'], 0, 68)?></p>
                                    <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id'], 'slug' => $offer['slug']]); ?>">Подробнее</a>
                                </div>
                            </div>
                            <div class="deals__block-desc">
                                <p class="deals__title"><?= $offer['title']; ?></p>
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
                <!--<div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-sale">-33%</div>
                        <div class="deals__block-img">
                            <img src="img/mazda_cx5.png" alt="">
                            <div class="deals__block-img-more">
                                <p>сделаем все</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="deals__block-desc">
                            <p class="deals__title">Скидка на мойку авто</p>
                            <div class="deals__block-desc-price">
                                <div class="deals__block-desc-price_old">
                                    <p><strike>120руб.</strike></p>
                                </div>
                                <div class="deals__block-desc-price_new">
                                    <p>80руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-sale">-33%</div>
                        <div class="deals__block-img">
                            <img src="img/mazda_cx5.png" alt="">
                            <div class="deals__block-img-more">
                                <p>сделаем все</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="deals__block-desc">
                            <p class="deals__title">Скидка на мойку авто</p>
                            <div class="deals__block-desc-price">
                                <div class="deals__block-desc-price_old">
                                    <p><strike>120руб.</strike></p>
                                </div>
                                <div class="deals__block-desc-price_new">
                                    <p>80руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-sale">-33%</div>
                        <div class="deals__block-img">
                            <img src="img/mazda_cx5.png" alt="">
                            <div class="deals__block-img-more">
                                <p>сделаем все</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="deals__block-desc">
                            <p class="deals__title">Скидка на мойку авто</p>
                            <div class="deals__block-desc-price">
                                <div class="deals__block-desc-price_old">
                                    <p><strike>120руб.</strike></p>
                                </div>
                                <div class="deals__block-desc-price_new">
                                    <p>80руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <!-- close .container -->

        </div>
        <!-- close .home-deals__content -->

        <!-- open .home-deals__controls -->
        <div class="home-deals__controls">
            <a href="#" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-sort="news" class="btn home-deals__new btn_controls_active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.16 97.16">
                    <g>
                        <path d="M48.58 0C21.793 0 0 21.793 0 48.58s21.793 48.58 48.58 48.58 48.58-21.793 48.58-48.58S75.367 0 48.58 0zm0 86.823c-21.087 0-38.244-17.155-38.244-38.243S27.493 10.337 48.58 10.337 86.824 27.492 86.824 48.58 69.667 86.823 48.58 86.823z"/>
                        <path d="M73.898 47.08H52.066V20.83c0-2.209-1.791-4-4-4s-4 1.791-4 4v30.25c0 2.209 1.791 4 4 4h25.832c2.209 0 4-1.791 4-4s-1.791-4-4-4z"/>
                    </g>
                </svg>
                НОВЫЕ
            </a>
            <a href="#" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-sort="popular" class="btn home-deals__new ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 507.936 507.936">
                    <path d="M506.397 194.265c-3.719-11.505-13.698-19.896-25.68-21.644l-137.014-19.896-61.245-124.111c-5.371-10.87-16.4-17.735-28.509-17.735s-23.138 6.865-28.509 17.735l-61.245 124.111-136.982 19.896c-11.982 1.748-21.93 10.139-25.648 21.644-3.75 11.505-.636 24.123 8.041 32.577l99.13 96.619-23.393 136.442c-2.034 11.918 2.86 23.964 12.649 31.083 5.498 4.036 12.046 6.07 18.656 6.07 5.053 0 10.139-1.208 14.779-3.655l122.521-64.423L376.47 493.37c4.608 2.479 9.725 3.687 14.779 3.687 6.579 0 13.158-2.034 18.72-6.07 9.757-7.119 14.652-19.165 12.618-31.083L399.195 323.46l99.13-96.619c8.644-8.422 11.791-21.071 8.072-32.576zM365.029 312.368l26.221 152.906-137.3-72.178-137.3 72.178 26.221-152.906L31.789 204.085l153.509-22.311 68.65-139.112 68.682 139.112 153.509 22.311-111.11 108.283z"/>
                </svg>
                ПОПУЛЯРНЫЕ
            </a>

            <a href="#" class="btn btn_orange home-fleamarket__all">Посмотреть все</a>
        </div>
        <!-- close .home-fleamarket__controls -->
    </section>
    <!-- close .home-deals -->


<?php
// $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]); 
/*$region = Yii::$app->ipgeobase->getLocation('5.153.133.222'); 
var_dump($region['region']);*/
?>