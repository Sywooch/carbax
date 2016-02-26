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


<p class="parag_text">Выберите автомобиль из <span>гаража:</span></p>

<p class="parag_text"><span>у Вас нет машин в гараже</span></p>

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

    <p class="parag_text">Выберите диаметр диска:</p>

    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_1" name="disk[]" value="1">
                <label class="text" for="11_1"><span></span>13”</label>

                <input type="checkbox" id="11_2" name="disk[]" value="2">
                <label class="text" for="11_2"><span></span>14”</label>

                <input type="checkbox" id="11_3" name="disk[]" value="3">
                <label class="text" for="11_3"><span></span>15”</label>

                <input type="checkbox" id="11_4" name="disk[]" value="4">
                <label class="text" for="11_4"><span></span>16”</label>

                <input type="checkbox" id="11_5" name="disk[]" value="5">
                <label class="text" for="11_5"><span></span>17”</label>

                <input type="checkbox" id="11_6" name="disk[]" value="6">
                <label class="text" for="11_6"><span></span>18”</label>

                <input type="checkbox" id="11_7" name="disk[]" value="7">
                <label class="text" for="11_7"><span></span>19”</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_8" name="disk[]" value="8">
                <label class="text" for="11_8"><span></span>20”</label>

                <input type="checkbox" id="11_9" name="disk[]" value="9">
                <label class="text" for="11_9"><span></span>21”</label>

                <input type="checkbox" id="11_10" name="disk[]" value="10">
                <label class="text" for="11_10"><span></span>22”</label>

                <input type="checkbox" id="11_11" name="disk[]" value="11">
                <label class="text" for="11_11"><span></span>23”</label>

                <input type="checkbox" id="11_12" name="disk[]" value="12">
                <label class="text" for="11_12"><span></span>24”</label>

                <input type="checkbox" id="11_13" name="disk[]" value="13">
                <label class="text" for="11_13"><span></span>25”</label>

                <input type="checkbox" id="11_14" name="disk[]" value="14">
                <label class="text" for="11_14"><span></span>26”</label>


            </div>
        </div>

    </div>

</div>
<div class="selection">
    <p class="parag_text">Дополнительно:</p>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_18" name="disk[]" value="18">
                <label class="text" for="11_18"><span></span>Аргонная сварка дисков</label>

                <input type="checkbox" id="11_19" name="disk[]" value="19">
                <label class="text" for="11_19"><span></span>Балансировка колес</label>

                <input type="checkbox" id="11_20" name="disk[]" value="20">
                <label class="text" for="11_20"><span></span>Мойка диска</label>

                <input type="checkbox" id="11_21" name="disk[]" value="21">
                <label class="text" for="11_21"><span></span>Мойка шины</label>

                <input type="checkbox" id="11_22" name="disk[]" value="22">
                <label class="text" for="11_22"><span></span>Переобувка литых дисков</label>

                <input type="checkbox" id="11_23" name="disk[]" value="23">
                <label class="text" for="11_23"><span></span>Переобувка стальных дисков</label>

                <input type="checkbox" id="11_24" name="disk[]" value="24">
                <label class="text" for="11_24"><span></span>Пескоструйка дисков</label>

                <input type="checkbox" id="11_25" name="disk[]" value="25">
                <label class="text" for="11_25"><span></span>Покраска дисков</label>

                <input type="checkbox" id="11_26" name="disk[]" value="26">
                <label class="text" for="11_26"><span></span>Полировка дисков</label>

                <input type="checkbox" id="11_27" name="disk[]" value="27">
                <label class="text" for="11_27"><span></span>Продажа шин</label>

                <input type="checkbox" id="11_28" name="disk[]" value="28">
                <label class="text" for="11_28"><span></span>Прокатка литых диско</label>

                <input type="checkbox" id="11_29" name="disk[]" value="29">
                <label class="text" for="11_29"><span></span>Прокатка стальных дисков</label>

                <input type="checkbox" id="11_30" name="disk[]" value="30">
                <label class="text" for="11_29"><span></span>Расточка дисков</label>

                <input type="checkbox" id="11_31" name="disk[]" value="31">
                <label class="text" for="11_31"><span></span>Ремонт шин</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_32" name="disk[]" value="32">
                <label class="text" for="11_32"><span></span>Реставрация дисков</label>

                <input type="checkbox" id="11_33" name="disk[]" value="33">
                <label class="text" for="11_33"><span></span>Сварка дисков</label>

                <input type="checkbox" id="11_34" name="disk[]" value="34">
                <label class="text" for="11_34"><span></span>Сезонное хранение колес</label>

                <input type="checkbox" id="11_35" name="disk[]" value="35">
                <label class="text" for="11_35"><span></span>Сезонное хранение шин</label>

                <input type="checkbox" id="11_36" name="disk[]" value="36">
                <label class="text" for="11_36"><span></span>Сход/развал</label>

                <input type="checkbox" id="11_37" name="disk[]" value="37">
                <label class="text" for="11_37"><span></span>Утилизация покрышек</label>

                <input type="checkbox" id="11_38" name="disk[]" value="38">
                <label class="text" for="11_38"><span></span>Чистка дисков</label>

                <input type="checkbox" id="11_39" name="disk[]" value="39">
                <label class="text" for="11_39"><span></span>Шиповка шин</label>

            </div>
        </div>

    </div>

</div>

<div class="selection" style="margin-bottom: 30px">
<div class="selection__content--lg">
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
</div></div>




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