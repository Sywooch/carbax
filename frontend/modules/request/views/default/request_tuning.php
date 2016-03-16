<?php
use common\models\db\RequestAddForm;
use frontend\modules\request\widget\AutoGarage;
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
<h1>Заявка на тюнинг</h1>
<form id="addForm" action="send_request" method="post">


    <p class="parag_text">выберите автомобиль из <span class="selectAutoGarage">гаража:</span></p>
    <div id="selectAutoGarage"><?= AutoGarage::widget()?></div>
    <!--<p class="parag_text"><span>у вас нет машин в гараже</span></p>-->

    <p class="parag_text">Выберите тип Вашего транспортного средства <span class="requestErrorTypeAutoRequest">Вы не выбрали тип авто</span></p>

    <div class="save">
        <input type="checkbox" name="typeAuto" value="1" id="a" class="typeAutoRequest">
        <label for="a">
                <span>
                    Легковой автомобиль
                </span>
        </label>
        <input type="checkbox" name="typeAuto" value="2" id="g" class="typeAutoRequest">
        <label for="g">
                <span>
                    Грузовой автомобиль
                </span>
        </label>

        <input type="checkbox" name="typeAuto" value="3" id="b" class="typeAutoRequest">
        <label for="b">
                <span>
                    Мотоцикл или скутер
                </span>
        </label>
    </div>

    <div class="select_bg">
        <div class="select_type requestManufacture">
            <select class="addContent__adress requestMarkAuto" name="requestMarkAuto">
                <option value="">Марка</option>
            </select>
        </div>
        <div class="select_type requestModelAuto">
            <select class="addContent__adress requestModelAuto" name="requestModelAuto">
                <option value="">Модель</option>
            </select>
        </div>
        <div class="select_type requestYear">
            <select class="addContent__adress requestYear" name="requestYear">
                <option value="">Год выпуска</option>
            </select>
        </div>
    </div>




    <div class="requestAddFieldGroupMoika">
        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    </div>

    <!--<p class="parag_text">Ваш регион: <span>Москва</span>. Добавить еще регион</p>

    <div class="select_type__manufacturer">
        <select class="select_type__manufacturer--sel" name="type_disk">
            <option value="">Введите название города</option>
            <option value="1">-</option>
            <option value="2">-</option>
            <option value="3">-</option>
            <option value="4">-</option>
            <option value="5">-</option>
            <option value="6">-</option>
            <option value="7">-</option>
            <option value="8">-</option>
            <option value="9">-</option>
            <option value="10">-</option>
        </select>
    </div>-->
    <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>

    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию" required="required"></textarea>
        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>
        <!--<div class="send">
            <a class="send_foto" href="#">Добавить фото</a>
        </div>-->

        <div class="addContent--save">
            <input type="submit" value="Отправить" class="btn btn-save" id="sendReq">
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->