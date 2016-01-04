<?php foreach($autoType as $at):?>
    <div class="singleContent__worksWith-block">

        <h4><?=$at->name?></h4>
        <img src="<?=$at->img_url;?>" alt="">
    </div>
<?php endforeach;?>