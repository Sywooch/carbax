<?php
/** @var $result common\models\db\ServiceType */
/** @var $address */
//\common\classes\Debug::prn($address);

?>



<!-- open .home-services -->
<section class="home-services">
    <!-- open .container -->
    <div class="container">
        <!-- open .home-services__wrap -->
        <div class="home-services__wrap">
            <?php foreach($result as $item): ?>
                <a href="<?= \yii\helpers\Url::to(['/all-services', 'idReg' => $address['region_id'], 'idCity' => $address['city_id'], 'typeId' => $item['infotype']->id . ','])?>" class="home-services__item">
                    <img src="<?= $item['infotype']->icon; ?>" alt="" />
                    <span><?= $item['infotype']->name; ?></span>
                    <span class="home-services__coounter"><?= $item['countservices'] ?></span>
                </a>
            <?php endforeach;?>
        </div>
        <!-- close .home-services__wrap -->

    </div>
    <!-- close .container -->
</section>
<!-- close .home-services -->
<!-- open .home-mapbox -->
<section class="home-mapbox">
    <!-- open .container -->
    <div class="container">
        <!-- open .home-mapbox__line -->
        <div class="home-mapbox__line">
            <a href="<?= \yii\helpers\Url::to(['/service-map']); ?>" class="btn btn_orange home-mapbox__btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                    <g>
                        <path d="M30 26c3.86 0 7-3.141 7-7s-3.14-7-7-7-7 3.141-7 7 3.14 7 7 7zm0-12c2.757 0 5 2.243 5 5s-2.243 5-5 5-5-2.243-5-5 2.243-5 5-5z"/>
                        <path d="M29.823 54.757L45.164 32.6c5.754-7.671 4.922-20.28-1.781-26.982C39.761 1.995 34.945 0 29.823 0s-9.938 1.995-13.56 5.617c-6.703 6.702-7.535 19.311-1.804 26.952l15.364 22.188zM17.677 7.031C20.922 3.787 25.235 2 29.823 2s8.901 1.787 12.146 5.031c6.05 6.049 6.795 17.437 1.573 24.399L29.823 51.243 16.082 31.4c-5.2-6.932-4.454-18.32 1.595-24.369z"/>
                        <path d="M42.117 43.007c-.55-.067-1.046.327-1.11.876s.328 1.046.876 1.11C52.399 46.231 58 49.567 58 51.5c0 2.714-10.652 6.5-28 6.5S2 54.214 2 51.5c0-1.933 5.601-5.269 16.117-6.507.548-.064.94-.562.876-1.11-.065-.549-.561-.945-1.11-.876C7.354 44.247 0 47.739 0 51.5 0 55.724 10.305 60 30 60s30-4.276 30-8.5c0-3.761-7.354-7.253-17.883-8.493z"/>
                    </g>
                </svg>
                Посмотреть на карте</a>
        </div>
        <!-- close .home-mapbox__line -->
    </div>
    <!-- close .container -->
</section>
<!-- close .home-mapbox -->