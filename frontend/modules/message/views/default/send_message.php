<?php
use common\models\db\User;
use yii\helpers\Html;

$this->title = "Написать сообщение";
$this->params['breadcrumbs'][] = ['label' => 'Входящие', 'url' => ['/message']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <form action="send" method="post">
        <p>Кому:
            <?= Html::textInput('message_to',(isset($_GET['from']) ? User::find()->where(['id'=>$_GET['from']])->one()->username : ''),['class'=>'message_to']); ?>
        </p>
        <p>Тема:
            <?= Html::textInput('message_subject',null,['class'=>'message_subject']); ?>
        </p>
        <p>Сообщение
            <?= Html::textarea('content'); ?>
        </p>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
        </div>
    </form>
</section>