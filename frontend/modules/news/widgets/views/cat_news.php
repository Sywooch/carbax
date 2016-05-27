<?php
//\common\classes\Debug::prn($category);
?>

<div class="deals__menu">
    <ul>
        <li><a href="/news" class="deals__menu--all" serviceId="0">Все</a></li>
        <?php foreach($category as $cat): ?>
            <li><a href="/news/all-news/<?= $cat->id;?>" class="deals__menu--all"><?= $cat->name;?></a></li>

        <?php endforeach; ?>
    </ul>
</div>
