<?php
use yii\helpers\Html;

use yii\helpers\Url;

//$resetLink = Yii::$app->urlManager->createUrl(['flea_market','id'=>$product->id]);
$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['flea_market/view','id'=>$product->id]);
//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);\
//echo $resetLink;

?>
<p>
    Ваше объявление <?= Html::a($product->name,$resetLink);?> опубликовано.
</p>
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl()); ?></p>

