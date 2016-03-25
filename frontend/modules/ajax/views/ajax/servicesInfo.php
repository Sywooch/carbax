<?php
use common\classes\Debug;
//Debug::prn($servicesInfo);








foreach($servicesInfo as $si): ?>

    <div class="offers_address">
        <h3><?= $si->name; ?></h3>
        <i class="fa fa-compass"></i>
        <a class="offers_website" target="_blank" href="<?= $si->website;; ?>"><?= $si->website;; ?></a>
        <div class="cleared"></div>

        <div class="offers_address--icons">
            <i class="fa fa-phone"></i>
        </div>
        <div class="offers_address--text">
                <?= $si[phone][0]->number?>
        </div>
    </div>

    <!--<div class="servise--info--offers">
        <div class="logo--servises--offers"><span><?/*= $si->name; */?></span></div>
        <div class="mail--services--offers"><?/*= $si->email; */?></div>
        <div class="site--services--offers"><?/*= $si->website;*/?></div>
        <div class="phone--services--offers"><?/*= $si[phone][0]->number*/?></div>
        <div class="phone--services--offers"><?/*= $si[phone][1]->number*/?></div>
    </div>-->
<?php endforeach; ?>
