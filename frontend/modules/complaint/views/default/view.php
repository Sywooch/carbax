<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Жалоба: " . $complaint->subject;
$this->params['breadcrumbs'][] = ['label' => 'Жалобы', 'url' => ['complaint']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>
<section class="main-container">
    <p>
        <?=Html::a('Назад', ['/complaint'], ['class' => 'btn btn-success'])?>
    </p>
    <table class="table table-bordered">
        <tr>
            <td>Тема:</td>
            <td><?= $complaint->subject ?></td>
        </tr>
        <tr>
            <td>Материал:</td>
            <td><?= Html::a($complaint->to_object, $complaint->to_object) ?></td>
        </tr>
        <tr>
            <td>Текст:</td>
            <td><?= $complaint->text ?></td>
        </tr>
    </table>
</section>