<?php
/**
 * @var $product common\models\db\Market
 */

//\common\classes\Debug::prn($product);
?>

<!-- open .home-fleamarket -->
<section class="home-fleamarket">
    <!-- open .container -->
    <div class="container">
        <!-- open .home-fleamarket__menu -->
        <nav class="home-fleamarket__menu">
            <ul>
                <li><a href="#" class="home-fleamarket__menu_item home-fleamarket__menu_item_active" data-type="1" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Авто</a></li>
                <li><a href="#" class="home-fleamarket__menu_item" data-type="2" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Мото</a></li>
                <li><a href="#" class="home-fleamarket__menu_item" data-type="3" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Грузовой </a></li>
                <li><a href="#" class="home-fleamarket__menu_item" data-type="zap" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Запчасти</a></li>
                <li><a href="#" class="home-fleamarket__menu_item" data-type="shina" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Шины</a></li>
                <li><a href="#" class="home-fleamarket__menu_item" data-type="disk" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">Диски</a></li>
            </ul>
        </nav>
        <!-- close .home-fleamarket__menu -->
        <!-- open .home-fleamarket__content -->
        <div class="home-fleamarket__content">
            <?php foreach($product as $item): ?>
                <!-- open .home-fleamarket__item -->
                <div class="home-fleamarket__item">
                    <a href="/flea-market/view/<?= $item->id?>/<?= $item->slug?>"><img src="/<?= $item['product_img'][0]->img; ?>" alt="" /></a>
                    <a href="/flea-market/view/<?= $item->id?>/<?= $item->slug?>" class="home-fleamarket__item_title"><?= $item->name;?></a>
                    <span class="home-fleamarket__item_price"><?= $item->price; ?> Р</span>
                    <span class="home-fleamarket__item_year"><?= (!empty($item['auto_widget']->year)) ?  $item['auto_widget']->year . 'г.в.' : ''; ?></span>
                    <?php $run = $item['auto_widget_params'][0]->run; ?>
                    <span class="home-fleamarket__item_mileage"><?= (!empty($run)) ? ',' . $run . 'км.' : ''; ?> </span>
                </div>
                <!-- close .home-fleamarket__item -->
            <?php endforeach; ?>
        </div>
        <!-- close .home-fleamarket__content -->
    </div>
    <!-- close .container -->
    <!-- open .home-fleamarket__controls -->
    <div class="home-fleamarket__controls">
        <a href="#" class="btn home-fleamarket__new btn_controls_active" data-sort="new" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.16 97.16">
                <g>
                    <path d="M48.58 0C21.793 0 0 21.793 0 48.58s21.793 48.58 48.58 48.58 48.58-21.793 48.58-48.58S75.367 0 48.58 0zm0 86.823c-21.087 0-38.244-17.155-38.244-38.243S27.493 10.337 48.58 10.337 86.824 27.492 86.824 48.58 69.667 86.823 48.58 86.823z"/>
                    <path d="M73.898 47.08H52.066V20.83c0-2.209-1.791-4-4-4s-4 1.791-4 4v30.25c0 2.209 1.791 4 4 4h25.832c2.209 0 4-1.791 4-4s-1.791-4-4-4z"/>
                </g>
            </svg>
            НОВЫЕ
        </a>
        <a href="#"  class="btn home-fleamarket__new" data-sort="popular" data-csrf="<?= Yii::$app->request->getCsrfToken()?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 507.936 507.936">
                <path d="M506.397 194.265c-3.719-11.505-13.698-19.896-25.68-21.644l-137.014-19.896-61.245-124.111c-5.371-10.87-16.4-17.735-28.509-17.735s-23.138 6.865-28.509 17.735l-61.245 124.111-136.982 19.896c-11.982 1.748-21.93 10.139-25.648 21.644-3.75 11.505-.636 24.123 8.041 32.577l99.13 96.619-23.393 136.442c-2.034 11.918 2.86 23.964 12.649 31.083 5.498 4.036 12.046 6.07 18.656 6.07 5.053 0 10.139-1.208 14.779-3.655l122.521-64.423L376.47 493.37c4.608 2.479 9.725 3.687 14.779 3.687 6.579 0 13.158-2.034 18.72-6.07 9.757-7.119 14.652-19.165 12.618-31.083L399.195 323.46l99.13-96.619c8.644-8.422 11.791-21.071 8.072-32.576zM365.029 312.368l26.221 152.906-137.3-72.178-137.3 72.178 26.221-152.906L31.789 204.085l153.509-22.311 68.65-139.112 68.682 139.112 153.509 22.311-111.11 108.283z"/>
            </svg>
            ПОПУЛЯРНЫЕ
        </a>

        <a href="#" class="btn btn_orange home-fleamarket__all">Посмотреть все</a>
    </div>
    <!-- close .home-fleamarket__controls -->

</section>
<!-- close .home-fleamarket -->
