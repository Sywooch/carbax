<?php
use common\models\db\User;

$this->title = "Мои сообщения";
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#inbox" data-toggle="tab">Входящие</a></li>
        <li><a href="#outbox" data-toggle="tab">Исходящие</a></li>
        <a href="/message/default/send_message" class="btn btn-info btn-xs send_message">Написать сообщение</a>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="inbox">
            <h3>Входящие</h3>
            <?php
            if (empty($inmsg)){
                ?>
                <span>Сообщений нет</span>
                <?php

            }
            else{ ?>
            <table class="table table-condensed">
                <tr>
                    <th>Дата отправки</th>
                    <th>Тема</th>
                    <th>от</th>
                    <th></th>
                </tr>
                <?php
                foreach ($inmsg as $ms):
                ?>
                <tr <?= ($ms->readed == 0 ? 'class="success"' : ''); ?>>
                    <td ><?= date('d.m.y',$ms->dt_send); ?></td>
                    <td ><?= $ms->subject ?></td>
                    <td ><?= User::find()->where(['id'=>$ms->from])->one()->username; ?></td>
                    <td >
                        <a href="/message/default/view?id=<?=$ms->id?>" class="btn btn-info btn-xs">Посмотреть</a>
                        <a href="/message/default/del?id=<?=$ms->id?>" data-confirm="Вы действительно хотите удалить?" class="btn btn-danger btn-xs">Удалить</a>
                    </td>
                </tr>
                <?php
                endforeach;

                ?>
            </table>
            <?php } ?>
        </div>
        <div class="tab-pane" id="outbox">
            <h3>Исходящие</h3>

            <?php
            if (empty($outmsg)){
                ?>
                <span>Сообщений нет</span>
                <?php

            }
            else{ ?>
            <table class="table table-condensed">
                <tr>
                    <th>Дата отправки</th>
                    <th>Тема</th>
                    <th>Кому</th>
                </tr>
                <?php
                foreach ($outmsg as $ms):
                    ?>
                    <tr <?= ($ms->readed == 0 ? 'class="success"' : ''); ?>>
                        <td ><?= date('d.m.y',$ms->dt_send); ?></td>
                        <td ><?= $ms->subject ?></td>
                        <td ><?= User::find()->where(['id'=>$ms->to])->one()->username; ?></td>
                    </tr>
                    <?php
                endforeach;

                ?>
            </table>
            <?php } ?>
        </div>


    </div>
</section>