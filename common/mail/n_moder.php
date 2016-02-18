<?php
use yii\helpers\Html;
$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['flea_market/view','id'=>$product->id]);
?>
<p>
    Ваше объявление <?= Html::a($product->name,$resetLink); ?> не прошло модерацию.
</p>
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl()); ?></p>