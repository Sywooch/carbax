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


    <p class="parag_text">выберите автомобиль из <span class="selectAutoGarage">гаража:</span></p>
    <div id="selectAutoGarage"></div>
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


<div class="mileage">
    <p class="parag_text">Укажите пробег автомобиля:</p>

    <input class="mileage__next probeg" name="probeg" placeholder="Введите пробег">

</div>

<div class="selection">
       <div class="selection__content--lg">
        <p class="parag_text">КПП:</p>
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="kpp1" class="kpp" name="kpp" value="1">
                <label class="text" for="kpp1"><span></span>Механика</label>

                <input type="checkbox" id="kpp2" class="kpp" name="kpp" value="2">
                <label class="text" for="kpp2"><span></span>Автомат</label>

                <input type="checkbox" id="kpp3" class="kpp" name="kpp" value="3">
                <label class="text" for="kpp3"><span></span>Робот</label>

                <input type="checkbox" id="kpp4" class="kpp" name="kpp" value="4">
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
<!--<div class="selection">
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

</div>-->


<!--<div class="addContent">
    <p class="parag_text">Способы оплаты:</p>
    <div class="singleContent__desc">
        <div class="singleContent__desc--works">
=======
<div class="selection" style="margin-bottom: 30px">

    <div class="selection__content--lg">
        <p class="parag_text">Способы оплаты:</p>
        <div class="singleContent__desc">
>>>>>>> 0e2d83c26968b9b4cb801f8b23c53da2fecd65d9

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
</div>-->


        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    <div class="cleared"></div>


    <!--<p class="parag_text">Ваш регион: <span>Москва</span>. Добавить еще регион</p>
=======
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
>>>>>>> 0e2d83c26968b9b4cb801f8b23c53da2fecd65d9

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

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%">Комментарии</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии">

        </textarea>


        <!--<div class="send">
            <a class="send_foto" href="#">Добавить фото</a>
        </div>-->

        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->