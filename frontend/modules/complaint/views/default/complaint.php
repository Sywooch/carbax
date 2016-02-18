<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Мои жалобы";
//$this->params['breadcrumbs'][] = ['label' => 'Жалобы', 'url' => ['/message']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>
<section class="main-container">
    <table class="table table-bordered">
        <tr>
            <th>Тема</th>
            <th>Смотреть</th>
            <th>Статус</th>
            <th>Удалить</th>
        </tr>
        <?php foreach($complaint as $c): ?>
            <tr>
                <td><?= $c->subject ?></td>
                <td><?=Html::a('Смотреть', ['/complaint/default/view', 'id'=>$c->id], ['class'=>'btn btn-success'])?></td>
                <td><?= ($c->read_complaint == 0) ? 'На рассмотрении' : 'Активна' ?></td>
                <td><?=Html::a('Удалить', ['/complaint/default/del', 'id'=>$c->id], ['class'=>'btn btn-danger'])?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>