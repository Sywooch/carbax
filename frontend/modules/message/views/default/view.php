<?php
use common\models\db\User;

$this->title = "Мои сообщения";
$this->params['breadcrumbs'][] = ['label' => 'Входящие', 'url' => ['/message']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <p>Тема: <?=$msg->subject;?></p>
    <p><?=$msg->content;?></p>
    <p>От: <?= User::find()->where(['id'=>$msg->from])->one()->name; ?></p>
    <p>Дата отправки: <?= date('d.m.y',$msg->dt_send); ?></p>
    <a href="/message/default/send_message?from=<?=$msg->from?>" class="btn btn-warning" >Ответить</a>
</section>