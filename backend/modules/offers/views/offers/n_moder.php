<?php
use yii\helpers\Html;

?>
<p>
    Ваше спецпредложение <?= Html::a($offers->title,Yii::$app->urlManagerFrontend->createUrl('offers/offers/view')."?id=".$offers->id);?> не прошло модерацию.
</p>
<p>С уважением, Администрация сайта <?= $_SERVER['HTTP_HOST']; ?></p>