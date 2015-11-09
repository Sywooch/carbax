<section class="news">
    <div class="contain">
        <h1 class="blockTitle orange">Новости из мира авто</h1>

<?php

foreach($news as $n):
    ?>
    <div class="news__block">
        <img src="<?=$n['img_url']?>" alt="">
        <a href="#nowhere" class="news__block-title"><?=$n['title']?></a>
        <a href="#nowhere" class="news__block-eye"><i></i><?=$n['views']?></a>
    </div>
    <?php
endforeach
?>
    </div>
</section>
