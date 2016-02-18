<?php
use common\models\db\User;
?>
<table class="table table-condensed">
    <tr>
        <th>Дата отправки</th>
        <th>Тема</th>
        <th>от</th>
        <th></th>
    </tr>
    <?php
        foreach ($message as $ms):
    ?>
    <tr <?= ($ms->readed == 0 ? 'class="success"' : ''); ?>>
        <td ><?= date('d.m.y',$ms->dt_send); ?></td>
        <td ><?= $ms->subject ?></td>
        <td ><a href="/profile/default/view?id=<?=$ms->from;?>"><?= User::find()->where(['id'=>$ms->from])->one()->username; ?></a></td>
        <td >
            <a href="/message/default/view?id=<?=$ms->id?>" class="btn btn-info btn-xs">Посмотреть</a>
            <a href="/message/default/del?id=<?=$ms->id?>" data-confirm="Вы действительно хотите удалить?" class="btn btn-danger btn-xs">Удалить</a>
        </td>
    </tr>
<?php
endforeach;

?>