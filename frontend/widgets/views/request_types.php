<?php
use yii\helpers\Url;
use yii\web\UrlManager;
?>

<nav class="<?=$classNav;?>" role="navigation">
    <ul class="<?=$classUl;?>">
        <?php foreach ( $req as $r ):?>
            <li><a href="<?= Url::to(['/request', 'id' => $r->id])?>"><?= $r->name; ?></a></li>
        <?php endforeach; ?>

    </ul>
</nav>