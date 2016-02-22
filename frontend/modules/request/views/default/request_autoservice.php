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

<p class="parag_text">Выберите тип Вашего транспортного срества</p>

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


<div class="mileage">
    <p class="parag_text">Укажите пробег автомобиля:</p>

    <input class="mileage__next" name="comm" placeholder="Введите пробег">
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
<div class="selection">
    <p class="parag_text">Ремонт:</p>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_18" name="disk[]" value="18">
                <label class="text" for="11_18"><span></span>Диагностика кондиционера</label>

                <input type="checkbox" id="11_19" name="disk[]" value="19">
                <label class="text" for="11_19"><span></span>Сход/развал</label>

                <input type="checkbox" id="11_20" name="disk[]" value="20">
                <label class="text" for="11_20"><span></span>Техническое обслуживание</label>

                <input type="checkbox" id="11_21" name="disk[]" value="21">
                <label class="text" for="11_21"><span></span>Замена масла</label>

                <input type="checkbox" id="11_22" name="disk[]" value="22">
                <label class="text" for="11_22"><span></span>Слесарные работы</label>

                <input type="checkbox" id="11_23" name="disk[]" value="23">
                <label class="text" for="11_23"><span></span>Кузовные работы</label>

                <input type="checkbox" id="11_24" name="disk[]" value="24">
                <label class="text" for="11_24"><span></span>Обслуживание кондиционера</label>

                <input type="checkbox" id="11_25" name="disk[]" value="25">
                <label class="text" for="11_25"><span></span>Ремонт выхлопной системы</label>

                <input type="checkbox" id="11_26" name="disk[]" value="26">
                <label class="text" for="11_26"><span></span>Ремонт двигателя</label>

                <input type="checkbox" id="11_27" name="disk[]" value="27">
                <label class="text" for="11_27"><span></span>Ремонт кондиционеров</label>

                <input type="checkbox" id="11_28" name="disk[]" value="28">
                <label class="text" for="11_28"><span></span>Ремонт и диагностика АКПП</label>

                <input type="checkbox" id="11_29" name="disk[]" value="29">
                <label class="text" for="11_29"><span></span>Ремонт и диагностика МКПП</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_30" name="disk[]" value="30">
                <label class="text" for="11_30"><span></span>Ремонт электрооборудования</label>

                <input type="checkbox" id="11_31" name="disk[]" value="31">
                <label class="text" for="11_31"><span></span>Установка аудио/видео оборудования</label>

                <input type="checkbox" id="11_32" name="disk[]" value="32">
                <label class="text" for="11_32"><span></span>Установка электронных охранных и противоугонных систем</label>

                <input type="checkbox" id="11_33" name="disk[]" value="33">
                <label class="text" for="11_33"><span></span>Проверка технического состояния</label>

                <input type="checkbox" id="11_34" name="disk[]" value="34">
                <label class="text" for="11_34"><span></span>Ремонт стекол</label>

                <input type="checkbox" id="11_35" name="disk[]" value="35">
                <label class="text" for="11_35"><span></span>Диагностика двигателя</label>

                <input type="checkbox" id="11_36" name="disk[]" value="36">
                <label class="text" for="11_36"><span></span>Диагностика тормозной системы</label>

                <input type="checkbox" id="11_37" name="disk[]" value="37">
                <label class="text" for="11_37"><span></span>Диагностика ходовой</label>

                <input type="checkbox" id="11_38" name="disk[]" value="38">
                <label class="text" for="11_38"><span></span>Ремонт выхлопных систем</label>

                <input type="checkbox" id="11_39" name="disk[]" value="39">
                <label class="text" for="11_39"><span></span>Ремонт гидроусилителя руля</label>

            </div>
        </div>

    </div>

</div>

<div class="addContent">
    <p class="parag_text">Способы оплаты:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">

            <input type="checkbox" id="11_36" name="disk[]" value="36">
            <label class="text" for="11_36"><span></span>Наличные</label>

            <input type="checkbox" id="11_37" name="disk[]" value="37">
            <label class="text" for="11_37"><span></span>Карточка</label>

            <input type="checkbox" id="11_38" name="disk[]" value="38">
            <label class="text" for="11_38"><span></span>Банковский перевод</label>

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

        <label for="addContent__description" style="width:100%">Комментарии</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии">

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