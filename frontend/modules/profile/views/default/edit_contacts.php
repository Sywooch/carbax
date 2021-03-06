<?php
use frontend\widgets\SelectAddress;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = "Редактировать личные данные";
$this->registerCssFile('/css/bootstrap_btn.min.css');
//$this->registerJsFile('/js/jquery.maskedinput.js');
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
    <form id="addForm" action="<?= Url::to(['add_to_sql'])?>" method="post" enctype="multipart/form-data">
        <p>Ваше имя <?= Html::textInput('name',$user->name,['id'=>'user_name']);?></p>
        <p>Ваша фамилия <?= Html::textInput('last_name',$user->last_name,['id'=>'user_last_name']);?></p>
        <?php
        echo '<label class="control-label">Добавить аватар</label>';
        echo FileInput::widget([
            'name' => 'file',
            'id' => 'input-4',
            'attribute' => 'attachment_1',
            'value' => '/media/img/1.png',

        ]);
        ?>
        <p>Ваш Email <?= Html::textInput('email',$user->email,['id'=>'user_email']);?></p>
        <p>Ваш телефон <?= Html::textInput('telephon',$user->telephon,['id'=>'user_telephon','title'=>'Формат: +7 (999) 999-9999']);?></p>
        <p>Ваш skype <?= Html::textInput('skype',$user->skype,['id'=>'user_skype']);?></p>
        <p>Ваш icq <?= Html::textInput('icq',$user->icq,['id'=>'user_isq','class'=>'numberInput']);?></p>
        <p>Ваша ссылка на профиль ВК <?= Html::textInput('link_vk',$user->link_vk,['id'=>'user_link_vk']);?></p>
        <!--<p>Регион по умолчанию
            <?/*=Html::dropDownList('region',$user->region_id, ArrayHelper::map($regions, 'id', 'name'), ['prompt'=>'Регион', 'id'=>'profileRegion'])*/?>
        </p>-->
        <p style="display: block; width: 100%; height: 40px">
            <?= SelectAddress::widget([
                'address'=>false,
                'defaultHeightSecondBlock' => '40px',
                'defaultRegion' => $user->region_id,
                'defaultCity' => $user->city_id
            ])?>
        </p>
        <hr>
        <p>Ваш новый пароль <?= Html::passwordInput('passwordUserEdit',null,['id'=>'user_password']);?></p>
        <span>Если не хотите менять пароль оставьте поле без изменений</span>
        <hr>
        <!--<div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
        </div>-->
        <div class="addContent--save">
            <input type="submit" value="Сохранить" class="btn btn-save">

        </div>
    </form>
    <span class="img_link" data-img="<?=$user->avatar?>"></span>
</section>