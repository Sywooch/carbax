<?php foreach($reviews as $rev):?>

<div class="home-comments__body">

    <div class="home-comments__item__head">
        <div class="home-comments__item__head--img">
            <?php
                if(empty($rev['user']['avatar'])):
            ?>
                <img src="../../media/img/recall_av.png" alt=""/>
            <?php
                else:
            ?>
                <img src="/<?= $rev['user']['avatar']; ?>" alt=""/>
            <?php
                endif;
            ?>
        </div>
        <p><?= $rev['user']['username']; ?></p>


    </div>

    <div class="home-comments__item__body">

        <div class="home-comments__item--date">
            <p>
                <?= date('d.m.Y H:i', $rev->dt_add)?>
            </p>

            <input id="input-2-xs" class="rating-loading input-2-xs" data-show-clear="false" data-show-caption="false" data-size="xs" value="<?= $rev->rating; ?>">
        </div>



        <div class="home-comments__item--desc">
            <p>
                <?= $rev->text; ?>
            </p>
        </div>

    </div>
</div>

<?php endforeach;