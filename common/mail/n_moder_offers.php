<?php
use yii\helpers\Html;

use yii\helpers\Url;

//$resetLink = Yii::$app->urlManager->createUrl(['flea_market','id'=>$product->id]);
$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['offers/offers/view','id'=>$offers->id]);
//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);\
//echo $resetLink;

?>
<!--<p>
    Ваше объявление <?/*= Html::a($product->name,$resetLink);*/?>
</p>
<p>С уважением, Администрация сайта <?/*= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl()); */?></p>-->

<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" data-editable="text">
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(255, 255, 255);">
            Здравствуйте,<br />
            Ваше спецпредложение <?= Html::a($offers->title,$resetLink,['style' => 'color:#fff;']); ?> не опубликовано.<br />
        </td>
    </tr>
    <tr>
        <td align="left" valign="top" style="padding: 10px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); border: 0px none transparent;"><br>
            <span style="font-family:Arial,Helvetica,sans-serif;color:#262626;font-size:14px"></span>
            <div data-box="button" style="width: 100%; margin-top: 0px; margin-bottom: 0px; text-align: center;">
                <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="button" style="padding-bottom: 0px; padding-top: 0px; margin: 0px auto;">
                    <tbody>
                    <tr>
                        <td valign="top" align="center" class="tdBlock" style="display: inline-block; padding: 13px 25px; margin: 0px; border-radius: 7px; background-color: rgb(255, 108, 0);">
                            <a href="<?= $resetLink?>" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: rgb(255, 255, 255); font-size: 18px; text-decoration: none; font-weight: bold;" target="_blank">Перейти к спецпредложению</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(255, 255, 255);">
            P.S. Если вы получили это сообщение по ошибке, просто удалите его.
            <p>С уважением, Администрация сайта <?= Html::a('CARBAX.RU',Yii::$app->urlManagerFrontend->createAbsoluteUrl(),['style' => 'color:#fff;']); ?></p>
        </td>
    </tr>
    </tbody>
</table>