<div class="singleContent__services">
    <div class="singleContent__services-comfort">
        <h3>Зона комфорта</h3>

        <?php
        $i = 1;
        foreach ($cz as $c):
            if ($i == 1 or $i == 7):
                ?>
                <div class="singleContent__services-comfort-block">
                <?php
            endif;
            ?>
            <input type="checkbox" value="<?= $c->id ?>" id="comfort_<?= $c->id ?>" name="comfort[]"/>
            <label for="comfort_<?= $c->id ?>"><i class="icon icon__wc" style="background-image: url('<?= $c->img_ulr ?>')"></i><?= $c->name ?><span></span></label>
            <?php
            $i++;
            if ($i == 1 or $i == 7):
                ?>
                </div>
                <?php
            endif;
        endforeach;
        ?>
        </div>
    </div>
</div>
