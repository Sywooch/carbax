<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="serviceSelectWrap">
    <h2>Выберите вид бизнеса</h2>
    <?php
    foreach ($service as $s):
        ?>
        <div class="serviceItem">
            <div class="serviceIcon"><?= Html::img(Url::base(true) . '/secure/' . $s->icon); ?></div>
            <div class="serviceLink"><?= Html::a($s->name, ['my_services', 'service_id' => $s->id]); ?></div>
        </div>
        <?php
    endforeach;
    ?>
</div>
