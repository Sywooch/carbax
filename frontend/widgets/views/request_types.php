<nav class="<?=$classNav;?>" role="navigation">
    <ul class="<?=$classUl;?>">
        <?php foreach ( $req as $r ):?>
            <li><a href="#"><?= $r->name; ?></a></li>
        <?php endforeach; ?>

    </ul>
</nav>