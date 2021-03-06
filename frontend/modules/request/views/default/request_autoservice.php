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
<h1>Заявка в автосервисы</h1>
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


<div class="mileage">
    <p class="parag_text">Укажите пробег автомобиля:</p>

    <input class="mileage__next probeg" name="probeg" id="addPrice" placeholder="Введите пробег" required="required">

</div>

<div class="selection">
       <div class="selection__content--lg">
        <p class="parag_text">КПП:</p>
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="kpp1" class="kpp" name="kpp[]" value="1">
                <label class="text" for="kpp1"><span></span>Механика</label>

                <input type="checkbox" id="kpp2" class="kpp" name="kpp[]" value="2">
                <label class="text" for="kpp2"><span></span>Автомат</label>

                <input type="checkbox" id="kpp3" class="kpp" name="kpp[]" value="3">
                <label class="text" for="kpp3"><span></span>Робот</label>

                <input type="checkbox" id="kpp4" class="kpp" name="kpp[]" value="4">
                <label class="text" for="kpp4"><span></span>Вариатор</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">
        <p class="parag_text">ДВС:</p>
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="dvs2" name="dvs[]" value="2">
                <label class="text" for="dvs2"><span></span>Дизель</label>

                <input type="checkbox" id="dvs1" name="dvs[]" value="1">
                <label class="text" for="dvs1"><span></span>Бензин</label>

                <input type="checkbox" id="dvs5" name="dvs[]" value="5">
                <label class="text" for="dvs5"><span></span>Газ</label>

                <input type="checkbox" id="dvs3" name="dvs[]" value="3">
                <label class="text" for="dvs3"><span></span>Гибрид</label>

                <input type="checkbox" id="dvs4" name="dvs[]" value="4">
                <label class="text" for="dvs4"><span></span>Электро</label>


            </div>
        </div>

    </div>

</div>






        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%">Комментарии</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии" required="required"></textarea>

        <?php echo Html::hiddenInput('request_type_id', $_GET['id']); ?>
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