<?php
use yii\helpers\Url;
?>

<div class="deals__menu">
    <ul>
        <li><a href="/offers/offers/all_offers?id=0" class="deals__menu--all" serviceId="0">Все</a></li>
        <?php

        foreach($srviceType as $st): ?>
            <!--<li><a href="/offers/offers/all_offers?id=<?/*= $st->id;*/?>" class="deals__menu--all"><?/*= $st->name;*/?></a></li>-->
            <li><a href="<?= Url::to(['/offers/offers/all_offers','id'=>$st->id]); ?>" class="deals__menu--all"><?= $st->name;?></a></li>
        <?php endforeach; ?>
    </ul>
</div>