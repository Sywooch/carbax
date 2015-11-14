<?php
use app\models\GeobaseRegion;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>
<section class="news">
    <div class="contain">
        <h1 class="blockTitle orange">Новости из мира авто</h1>

<?php

foreach($news as $n):
    ?>
    <div class="news__block">
        <img src="<?=$n['img_url']?>" alt="">
        <a href="<?= Url::to(['/news/news/view', 'id' => $n['id']])?>" class="news__block-title"><?=$n['title']?></a>
        <a href="#nowhere" class="news__block-eye"><i></i><?=$n['views']?></a>
    </div>
    <?php
endforeach
?>
        <a class="news__more-link news__block-title" href="<?= Url::to(['/news/news/page'])?>">Посмотреть все новости</a>
    </div
<!--        echo $_SERVER["REMOTE_ADDR"];-->
<!--        --><?php //var_dump(Yii::$app->ipgeobase->getLocation('109.110.64.1'));
//        $model = GeobaseRegion::find()->all();
//        echo AutoComplete::widget([
//            'model' => $model,
//            'attribute' => 'country',
//            'clientOptions' => [
//                'source' => ['USA', 'RUS'],
//            ],
//        ]);
//        ?>

</section>
