<div class="deals__menu">
    <ul>
        <li><a href="#" class="deals__menu--all deals__menu--service" serviceId="0">Все</a></li>
        <?php foreach($srviceType as $st): ?>
            <li><a href="#" class="deals__menu--all deals__menu--service"><?= $st->name;?></a></li>
        <?php endforeach; ?>
    </ul>
</div>