<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use common\models\db\CategoryNews;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>

<!-- open .home-news -->
<section class="home-news">
    <!-- open .home-news__topline -->
    <div class="home-news__topline">
        <!-- open .container -->
        <div class="container">
            <a href="<?= Url::to(['/news'])?>">
                <img src="/theme/carbax/img/carbax_logo_2.png" alt="" />
                <strong>новости</strong>
            </a>
        </div>
        <!-- close .container -->
    </div>
    <!-- close .home-news__topline -->
    <!-- open .home-news__content -->
    <div class="home-news__wrap">
        <!-- open .container -->
        <div class="container">
            <!-- open .home-news__nav -->
            <div class="home-news__menu">
                <ul>
                    <li><a href="#" class="home-news__menu_item home-news__menu_item_active" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="0">Все </a></li>
                    <?php foreach($category as $cat): ?>
                        <li><a href="#" class="home-news__menu_item" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?= $cat->id; ?>"><?= $cat->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- close .home-news__nav -->
            <!-- open .home-news__content -->
            <div class="home-news__content">

                <?php foreach($news as $item): ?>
                    <!-- open .home-news__item -->
                    <div class="home-news__item">
                        <a href="<?= Url::to(['/news/news/view', 'id' => $item['id'],'slug' => $item['slug']])?>"><img src="<?= $item['img_url']; ?>" alt="" /></a>
                        <a href="#" class="home-news__item_title"><?= $item['title']; ?></a>
                        <p><?= $item['short_description']; ?></p>
                        <!-- open .home-news__item_info -->
                        <div class="home-news__item_info">
                            <span class="home-news__item_date">Добавлено <em><?= date('d.m.Y', $item['dt_add'])?></em></span>
                            <span class="home-news__item_visit"><?= $item['views']; ?></span>
                        </div>
                        <!-- close .home-news__item_info -->
                    </div>
                    <!-- close .home-news__item -->
                <?php endforeach; ?>

            </div>
            <!-- close .home-news__content -->
        </div>
        <!-- close .container -->
    </div>
    <!-- close .home-news__content -->
    <!-- open .home-news__controls -->
    <div class="home-news__controls">
        <a href="<?= Url::toRoute(['/news'])?>" class="btn btn_orange home-fleamarket__all home_new_all">Посмотреть все</a>
    </div>
    <!-- close .home-news__controls -->
</section>
<!-- close .home-news -->