<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<table width="1000px" align="center" cellpadding="0" cellspacing="0" border="0" data-mobile="true" dir="ltr"  style="font-size: 16px; background: url(http://carbax.ru/frontend/web/media/img/mail/mail_bg.jpg) 50% 0% no-repeat rgb(196, 196, 196);">
    <thead>
    <tr>
        <td align="center">
            <table cellspacing="0" cellpadding="0" align="center" border="0" class="wrapper" width="600" style="width: 600px; margin: auto;">
                <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="padding: 8px; font-family: Helvetica, Arial, sans-serif; color: rgb(38, 38, 38);">
                                    <br>
                                    <div><br>
                                    </div>
                                    <div><br></div>
                                    <div><br></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin: 0; padding: 0;">
            <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: auto; width: 600px; background-image: none; background-color: transparent;" class="wrapper">
                <tbody>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody>
                            <tr>
                                <td valign="top" align="left" style="padding: 0px; margin: 0px;">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="" align="left" valign="top">
                                                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="left" style="padding: 10px; margin: 0px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); line-height: 2.05; background-color: rgba(15, 15, 15, 0.498039);">
                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" data-editable="image" style="text-align: right; margin: 0px; padding: 0px;" data-mobile-width="1" id="edi7i0nm" width="154">
                                                                <tbody>
                                                                <tr style="text-align: right;">
                                                                    <td valign="top" align="left" style="display: inline-block; padding: 0px 10px 10px 0px; margin: 0px;" class="tdBlock"><img src="http://carbax.ru/frontend/web/media/img/mail/mail_logo.png" width="144"  height="49" style="border: 0px none transparent; display: block;"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <span><div style="text-align: right;">
                                                                    <a style="text-decoration:none;" href="http://carbax.ru" target="_blank"><span style="font-size: 24px; color: rgb(255, 108, 0); font-family: Tahoma, sans-serif; background-color: inherit;">ПЕРЕЙТИ НА САЙТ</span></a>
                                                                </div></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background-color: rgba(15, 15, 15, 0.498039);">
                                    <div style="">
                                        <img src="http://carbax.ru/frontend/web/media/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="margin: 0; padding: 0;">
                        <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" data-editable="text">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: rgba(15, 15, 15, 0.498039);">
                                    <?= $content ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background-color: rgba(15, 15, 15, 0.498039);">
                                    <div style="">
                                        <img src="http://carbax.ru/frontend/web/media/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line" style="background: url(http://carbax.ru/frontend/web/media/img/mail/news_bg.png) repeat-y;">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px;" >
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="350" data-editable="line" style="background-color: #fff;">
                                        <tbody>
                                        <?php
                                        $news = \common\models\db\News::find()->orderBy('dt_add DESC')->one();
                                        $url_img = substr($news->img_url, 0, 4);
                                        ?>
                                        <tr>
                                            <td style="text-align: center; padding-top: 10px;"><span style="font-size:12px;"><?= date('d-m-Y', $news->dt_add)?></span></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><span style="font-size: 16px; font-weight:bold;"><?= $news->title; ?></span></td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td><img src="http://carbax.ru/frontend/web/media/img/mail/short_line.png" alt=""></td>
                                        </tr>
                                        <tr><td style="text-align: center;"><img width="250px" src="<?= ($url_img == 'http') ? $news->img_url : "http://carbax.ru/frontend/web".$news->img_url ?>" alt="" style="border-radius:5px;"></td></tr>
                                        <tr>
                                            <td style="text-align: center;">
                                                <div style="color:#aeaeae;padding: 0 20px;">
                                                    <?= $news->short_description; ?>
                                                </div>
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
                                                                <a href="http://carbax.ru/news/news/view?id=<?= $news->id; ?>" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: rgb(255, 255, 255); font-size: 18px; text-decoration: none; font-weight: bold;" target="_blank">Подробнее</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0"style="background-color: #fff;">
                        <tbody>
                        <tr>
                            <td style="text-align: center; padding-top: 26px;">
                                <span style="font-family:Tahoma; text-transform: uppercase; color:#282828;font-size: 18px; font-weight: bold;">узнай все самые свежие новости сейчас!</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><img src="http://carbax.ru/frontend/web/media/img/mail/short_line.png" alt=""></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="padding: 10px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); border: 0px none transparent;">
                                <span style="font-family:Arial,Helvetica,sans-serif;color:#262626;font-size:14px"></span>
                                <div data-box="button" style="width: 100%; margin-top: 0px; margin-bottom: 0px; text-align: center;">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="button" style="padding-bottom: 0px; padding-top: 0px; margin: 0px auto;">
                                        <tbody>
                                        <tr>
                                            <td valign="top" align="center" class="tdBlock" style="display: inline-block; padding: 13px 25px; margin: 0px; border-radius: 7px; background-color: rgb(255, 108, 0);">
                                                <a href="http://carbax.ru/news/news/index" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: rgb(255, 255, 255); font-size: 18px; text-decoration: none; font-weight: bold;" target="_blank">Перейти</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </tr>


                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0" style="padding: 35px;background: #282828;">
                            <tbody>
                            <tr>
                                <td style="padding-left: 25px;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span style="color:#fff; text-transform: uppercase;">наши контакты</span>
                                            </td>
                                        </tr>
                                        <tr><td><img src="http://carbax.ru/frontend/web/media/img/mail/short_lineW.png" alt=""></td></tr>
                                        <tr><td><span style="padding-top: 42px;display: table;"></span></td></tr>
                                        <tr><td><span style="color:#fff;">+7 (945) 555 63 63</span></td></tr>
                                        <tr><td><span style="color:#fff;">Email: carbax@mail.com</span></td></tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-left: 20px;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span style="color:#fff; text-transform: uppercase;">Следи за нами</span>
                                            </td>
                                        </tr>
                                        <tr><td><img src="http://carbax.ru/frontend/web/media/img/mail/short_lineW.png" alt=""></td></tr>
                                        <tr>
                                            <td>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/vk.png" alt=""></a></span>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/fb.png" alt=""></a></span>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/px.png" alt=""></a></span>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/ok.png" alt=""></a></span>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/tw.png" alt=""></a></span>
                                                <span><a href=""><img src="http://carbax.ru/frontend/web/media/img/mail/gg.png" alt=""></a></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="http://carbax.ru/frontend/web/media/img/mail/mail_logo.png" alt="" width="106px;">
                                            </td>
                                        </tr>
                                        <tr><td></td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background: #282828;">
                                    <div style="">
                                        <img src="http://carbax.ru/frontend/web/media/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="padding: 8px; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background: #282828;">
                                    <span style="color: rgb(255, 255, 255);">© 2016 by Carbax.ru. All Rights Reserved.</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
<?php $this->endPage() ?>
