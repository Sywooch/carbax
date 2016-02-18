<?php
use yii\helpers\Html;
<<<<<<< HEAD
use yii\helpers\Url;

//$resetLink = Yii::$app->urlManager->createUrl(['flea_market','id'=>$product->id]);
$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['flea_market/view','id'=>$product->id]);
//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);\
//echo $resetLink;
=======



$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['flea_market/view','id'=>$product->id]);

>>>>>>> f8e785566ad1c37d2777049791a074de6d949bf6
?>
<p>
    Ваше объявление <?= Html::a($product->name,$resetLink);?> опубликовано.
</p>
<<<<<<< HEAD
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl()); ?></p>
=======
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl('')); ?></p>
>>>>>>> f8e785566ad1c37d2777049791a074de6d949bf6
