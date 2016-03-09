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

<form id="addForm" action="send_request" method="post">


    <p class="parag_text">выберите автомобиль из <span class="selectAutoGarage">гаража:</span></p>
    <div id="selectAutoGarage"><?= AutoGarage::widget()?></div>
    <!--<p class="parag_text"><span>у вас нет машин в гараже</span></p>-->

    <p class="parag_text">Выберите тип Вашего транспортного средства</p>

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

<div class="mileage">
    <p class="parag_text">Укажите Vin-код атомобиля:</p>

    <input class="mileage__next vincodeauto" name="vincodeauto" placeholder="Введите код">
</div>


<div class="mileage">
    <div class="mileage_wr">
        <p class="parag_text">Укажите наименование запчасти:</p>

        <input class="mileage__next" name="name_zap[]" placeholder="Наименование запчасти">
    </div>

    <div class="mileage_wr">
        <p class="parag_text">Укажите номер детали (если знаете):</p>

        <input class="mileage__next" name="kod_zap[]" placeholder="Введите код">
    </div>
    <div class="save_plus">
        <span class="add_zap add_zap_plus">
            +
        </span>

    </div>

</div>

    <span class="infoZap"></span>




<!--<div class="addContent">
    <p class="parag_text">Выберите тип обслуживания:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">

            <input type="checkbox" id="11_36" name="disk[]" value="36">
            <label class="text" for="11_36"><span></span>с установкой</label>

            <input type="checkbox" id="11_37" name="disk[]" value="37">
            <label class="text" for="11_37"><span></span>без установки</label>

        </div>
    </div>
</div>


<div class="addContent">
    <p class="parag_text">Выберите состояние:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">

            <input type="checkbox" id="11_38" name="disk[]" value="38">
            <label class="text" for="11_38"><span></span>новое</label>

            <input type="checkbox" id="11_39" name="disk[]" value="39">
            <label class="text" for="11_39"><span></span>Б/У</label>

        </div>
    </div>
</div>

<div class="addContent">
    <p class="parag_text">Способы оплаты:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">

            <input type="checkbox" id="11_40" name="disk[]" value="40">
            <label class="text" for="11_40"><span></span>Наличные</label>

            <input type="checkbox" id="11_41" name="disk[]" value="41">
            <label class="text" for="11_41"><span></span>Карточка</label>

            <input type="checkbox" id="11_42" name="disk[]" value="42">
            <label class="text" for="11_42"><span></span>Банковский перевод</label>

        </div>
    </div>
</div>

<div class="addContent">
    <p class="parag_text">Выберите способ доставки:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">

            <input type="checkbox" id="11_43" name="disk[]" value="43">
            <label class="text" for="11_43"><span></span>Самовывоз</label>

            <input type="checkbox" id="11_44" name="disk[]" value="44">
            <label class="text" for="11_44"><span></span>Курьер</label>

            <input type="checkbox" id="11_45" name="disk[]" value="45">
            <label class="text" for="11_45"><span></span>Транспортная</label>

        </div>
    </div>
</div>
-->


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
    <div class="requestAddFieldGroupMoika">
        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    </div>
    <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px"">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии"></textarea>
        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>

       <!-- <div class="send">
            <a class="send_foto" href="#">Добавить фото</a>
        </div>-->

        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->