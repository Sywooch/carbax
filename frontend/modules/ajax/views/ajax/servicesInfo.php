<?php
use common\classes\Debug;
//Debug::prn($servicesInfo);
foreach($servicesInfo as $si): ?>
    <div class="servise--info--offers">
        <div class="logo--servises--offers"><img src="/<?= $si->photo;?>" alt="" width="15px"><span><?= $si->name; ?></span></div>
        <div class="mail--services--offers"><?= $si->email; ?></div>
        <div class="site--services--offers"><?= $si->website;?></div>
        <div class="phone--services--offers"><?= $si[phone][0]->number?></div>
        <div class="phone--services--offers"><?= $si[phone][1]->number?></div>
    </div>
<?php endforeach; ?>
