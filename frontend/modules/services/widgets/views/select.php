<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<section class="main-container">
    <div class="busines-type">
        <h3>выберите вид бизнеса</h3>
        <?php
        foreach ($service as $s):
            ?>
            <a href="<?= Url::to(['my_services', 'service_id' => $s->id]) ?>" class="busines-type--link">
				<span class="icon_b icon_b_autosalon" style="background-image: url('/secure/<?= $s->icon ?>')">
				</span>
                <?= $s->name ?>
            </a>
            <?php
        endforeach;
        ?>
    </div>
</section>
