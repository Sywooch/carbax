<?php
use common\models\db\RequestAddForm;
use frontend\widgets\CustomField;
use frontend\widgets\RegionSelect;
use frontend\widgets\RequestAddFieldGroup;
use yii\helpers\Html;

$this->title = "Добавить заявку";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!----AKD47 section---->

<section class="main-container">
<h1>Заявка в автосалоны</h1>
<form id="addForm" action="send_request" method="post">

<p class="parag_text">Выберите тип транспортного средства <span class="requestErrorTypeAutoRequest">Вы не выбрали тип авто</span></p>

    <div class="save">
        <input type="checkbox" name="typeAuto" value="1" id="car" class="typeAutoRequest typeAutoAutosalon">
        <label for="car">
                <span>
                    Легковой автомобиль
                </span>
        </label>
        <input type="checkbox" name="typeAuto" value="2" id="autotruck" class="typeAutoRequest typeAutoAutosalon">
        <label for="autotruck">
                <span>
                    Грузовой автомобиль
                </span>
        </label>

        <input type="checkbox" name="typeAuto" value="3" id="moto" class="typeAutoRequest typeAutoAutosalon">
        <label for="moto">
                <span>
                    Мотоцикл или скутер
                </span>
        </label>
    </div>






<div class="manufactureRequest"></div>

    <div class="requestAddFieldGroup">
        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    </div>
        <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>


    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px"">Комментарии:</label>

        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию"></textarea>
        <?php echo Html::hiddenInput('request_type_id', $_GET['id']); ?>

        <label for="" style="width:100%; font-size:15px">Контакты</label>
        <input type="text" id="" class="addContent__text" name="fio" value="" placeholder="Введите ФИО" required="required">
        <input type="text" id="user_telephon" class="addContent__text" name="tel" value="" placeholder="Введите Ваш номер телефона" title="Формат: +7 (999) 999-9999" required="required">
        <input type="text" id="" class="addContent__text" name="email" value="" placeholder="Введите e-mail" required="required">
    </div>


    <div class="addContent--save">
        <input type="submit" value="Отправить" class="btn btn-save" id="sendReq">
    </div>
</form>
</section>

<!----AKD47 section end---->