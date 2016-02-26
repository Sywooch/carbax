<div class="selection">
    <?php
    $kol = 0;
    foreach($brand as $br):?>
    <?php if ($kol == 28):?>
    <a class="allBrands" href="">Показать все</a>
    <div class="hiddenBrand">
        <?php endif;?>
        <div class="selection__width">
            <div class="singleContent__desc wh">
                <div class="singleContent__desc--works wh">
                    <input type="checkbox" id="brand_<?= $br->id_car_mark; ?>" name="brand[]" value="<?= $br->id_car_mark; ?>">
                    <label class="text wh" for="brand_<?= $br->id_car_mark; ?>"><span></span><?= $br->name; ?></label>
                </div>
            </div>
        </div>
        <?php
        $kol++;
        endforeach; ?>
    </div>
</div>