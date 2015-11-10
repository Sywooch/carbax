<div class="singleContent__worksWith">
    <h3>Работаем</h3>
    <?php
        foreach($auto as $a):
    ?>
    <div class="singleContent__worksWith-block">

        <h4><?=$a->name;?></h4>
        <img src="<?=$a->img_url;?>" alt="">
        <input type="checkbox" id="gruz_<?=$a->id;?>" value="<?=$a->id;?>" name="workWith[]" />
        <label for="gruz_<?=$a->id;?>"><span></span></label>
    </div>
        <?php endforeach; ?>
</div>
