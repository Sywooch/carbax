<?php
use common\models\db\User;

$this->title = "Мои сообщения";
$this->params['breadcrumbs'][] = ['label' => 'Входящие', 'url' => ['/message']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <div class="messsage_view_header">
        <span class="userFrom"><b>От:</b> <a href="/profile/default/view?id=<?=$msg->from;?>"><?= User::find()->where(['id'=>$msg->from])->one()->username; ?></a></span>
        <span class="dateSend"><b>Дата отправки:</b> <?= date('d.m.y',$msg->dt_send); ?></span>
    </div>

    <span class="masSabject"><b>Тема:</b> <?=$msg->subject;?></span>
    <hr>
    <span><b>Текст сообщения</b></span>
    <p><?=$msg->content;?></p>
    <?php
        if($msg->from_type == 'request'){
            ?>
            <a href="/message/default/send_message?from=<?=$msg->from?>&request=request&type=<?=$msg->type_id?>" class="btn btn-warning" >Ответить</a>
            <?php
        }else{
            ?>
            <a href="/message/default/send_message?from=<?=$msg->from?>" class="btn btn-warning" >Ответить</a>
            <?php
        }
    ?>

</section>