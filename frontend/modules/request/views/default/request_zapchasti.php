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

<form id="addForm" action="send_request" method="post">


<p class="parag_text">выберите автомобиль из <span>гаража:</span></p>

<p class="parag_text"><span>у вас нет машин в гараже</span></p>

<p class="parag_text">Выберите тип Вашего транспортного средаства:</span></p>

<div class="save_sm">
    <input type="checkbox" value="none" id="1">
    <label for="1">
                <span>
                    Легковой автомобиль
                </span>
    </label>
    <input type="checkbox" value="none" id="2">
    <label for="2">
                <span>
                    Автобус
                </span>
    </label>
    <input type="checkbox" value="none" id="3">
    <label for="3">
                <span>
                   Грузовой автомобиль
                </span>
    </label>
    <input type="checkbox" value="none" id="4">
    <label for="4">
                <span>
                    Мотоцикл или скутер
                </span>
    </label>
</div>


<div class="select_bg">
    <div class="select_type">
        <select class="addContent__adress" name="type_disk">
            <option value="">Марка</option>
            <option value="1">Кованые</option>
            <option value="2">Литые</option>
            <option value="3">Штампованные</option>
            <option value="4">Спицованные</option>
            <option value="5">Сборные</option>
        </select>
    </div>
    <div class="select_type">
        <select class="addContent__adress" name="type_disk">
            <option value="">Модель</option>
            <option value="1">-</option>
            <option value="2">-</option>
            <option value="3">-</option>
            <option value="4">-</option>
            <option value="5">-</option>
        </select>
    </div>
    <div class="select_type">
        <select class="addContent__adress" name="type_disk">
            <option value="">Год выпуска</option>
            <option value="1">-</option>
            <option value="2">-</option>
            <option value="3">-</option>
            <option value="4">-</option>
            <option value="5">-</option>
        </select>
    </div>
</div>

<div class="selection">
    <div class="selection__content--lg">
        <p class="parag_text">КПП:</p>
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_1" name="disk[]" value="1">
                <label class="text" for="11_1"><span></span>Автомат</label>

                <input type="checkbox" id="11_2" name="disk[]" value="2">
                <label class="text" for="11_2"><span></span>Вариатор</label>

                <input type="checkbox" id="11_3" name="disk[]" value="3">
                <label class="text" for="11_3"><span></span>Робот</label>

                <input type="checkbox" id="11_4" name="disk[]" value="4">
                <label class="text" for="11_4"><span></span>Механика</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">
        <p class="parag_text">ДВС:</p>
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_15" name="disk[]" value="15">
                <label class="text" for="11_15"><span></span>Дизель</label>

                <input type="checkbox" id="11_16" name="disk[]" value="16">
                <label class="text" for="11_16"><span></span>Бензин</label>

                <input type="checkbox" id="11_17" name="disk[]" value="17">
                <label class="text" for="11_17"><span></span>Газ</label>


            </div>
        </div>

    </div>

</div>

<div class="mileage">
    <p class="parag_text">Укажите Vin-код атомобиля:</p>

    <input class="mileage__next" name="comm" placeholder="Введите код">
</div>


<div class="mileage">
    <p class="parag_text">Укажите наименование запчасти:</p>

    <input class="mileage__next" name="comm" placeholder="Введите код">

    <div class="save_plus">
        <input type="checkbox" value="none" id="5">
        <label for="5">
                <span>
                    +
                </span>
        </label>
    </div>

</div>

<div class="mileage">
    <p class="parag_text">Укажите номер детали (не обязательно):</p>

    <input class="mileage__next" name="comm" placeholder="Введите код">
</div>


<div class="addContent">
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

<form id="addForm" action="send_request" method="post">

    <div></div>
    <div></div>

    <?php
    $diameter = [];
    for ($i = 7; $i <= 30; $i++) {
        $diameter[$i] = $i;
    }

    $section_width = [];
    for ($i = 60; $i <= 395; $i += 5) {
        $section_width[$i] = $i;
    }

    $section_height = [];
    for ($i = 25; $i <= 110; $i += 5) {
        $section_height[$i] = $i;
    }
    ?>



    <p class="parag_text">Ваш регион: <span>Москва</span>. Добавить еще регион</p>

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
    </div>


    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px"">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию">

        </textarea>


        <div class="send">
            <a class="send_foto" href="#">Добавить фото</a>
        </div>

        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->