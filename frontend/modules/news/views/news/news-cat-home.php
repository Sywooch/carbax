<?php
use yii\helpers\Url;

foreach($news as $item): ?>
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