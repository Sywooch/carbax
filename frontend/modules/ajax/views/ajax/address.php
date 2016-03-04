<h4><?= $service->name; ?></h4>
<div class="addContent">
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">
            <?php foreach($address as $adr): ?>
                <input type="checkbox"  id="address_<?=$adr->id;?>" name="addressId[]" class="addressId" value="<?= $adr->id?>"/>
                <label for="address_<?=$adr->id;?>"><span></span><?= $adr->address; ?></label>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="cleared"></div>
