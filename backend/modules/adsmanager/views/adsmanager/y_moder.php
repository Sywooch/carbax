<?php
use yii\helpers\Html;

?>
<p>
    Ваше объявление <?= Html::a($product->name,Yii::$app->urlManagerFrontend->createUrl('flea_market/default/view')."?id=".$product->id);?> опубликовано.
</p>
<p>С уважением, Администрация сайта <?= $_SERVER['HTTP_HOST']; ?></p>