<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = "Отзывы";
?>
    <h1>Отзывы</h1>
    <table class="table table-bordered">
        <tr>
            <th>Текст</th>
            <th>Дата добавления</th>
            <th>Имя пользователя</th>
            <th>Статус</th>
        </tr>
        <?php foreach ($reviews as $rev): ?>
            <tr>
                <td><?= $rev->text; ?></td>
                <td><?= date('d.m.Y H:i', $rev->dt_add)?></td>
                <td><?= $rev['user']['username']; ?></td>
                <td><?= Html::dropDownList('status',$rev->publ,['0'=>'Не опубликовано', '1' => 'Опубликовано'],['class'=>'statusReviews','data-id'=>$rev->id]);?></td>
            </tr>
        <?php endforeach; ?>

    </table>
<?= LinkPager::widget(['pagination' => $pagination]) ?>