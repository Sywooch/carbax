<?php
use yii\helpers\Html;
$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['flea_market/view','id'=>$product->id]);
?>
<p>
    Ваше объявление <?= Html::a($product->name,$resetLink); ?> не прошло модерацию.
</p>
<<<<<<< HEAD
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl()); ?></p>
=======
<p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl('')); ?></p>
>>>>>>> f8e785566ad1c37d2777049791a074de6d949bf6
