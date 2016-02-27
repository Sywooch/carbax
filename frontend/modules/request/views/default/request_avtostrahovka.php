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


<p class="parag_text">Выберите тип Вашего транспортного средаства:</p>

<div class="save_auto">
    <input type="checkbox" value="none" id="1">
    <label for="1">
                <span>
                   Легковой автомобиль
                </span>
    </label>
    <input type="checkbox" value="none" id="2">
    <label for="2">
                <span>
                    Такси
                </span>
    </label>
    <input type="checkbox" value="none" id="3">
    <label for="3">
                <span>
                    Автобус
                </span>
    </label>
    <input type="checkbox" value="none" id="4">
    <label for="4">
                <span>
                    Грузовой автомобиль
                </span>
    </label>
    <input type="checkbox" value="none" id="5">
    <label for="5">
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


<div class="mileage_sm">
    <p class="parag_text">Дата начала эксплуатации:</p>

    <input class="mileage__next" name="comm" placeholder="Введите дату хх.хх.хххх">
</div>


<div class="mileage_sm">
    <p class="parag_text">Количество лошадиных сил:</p>

    <input class="mileage__next" name="comm" placeholder="Введите ">

</div>

<div class="mileage_sm">
    <p class="parag_text">Пробег:</p>

    <input class="mileage__next" name="comm" placeholder="Введите значение">
</div>

<div class="mileage_sm">
    <p class="parag_text">Страховая сумма:</p>

    <input class="mileage__next" name="comm" placeholder="Введите значение">
</div>



<div class="select_type__driver">

    <p class="parag_text">Автомобиль куплен:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<div class="select_type__driver">

    <p class="parag_text">Коробка передач:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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


<div class="select_type__driver">

    <p class="parag_text">Список водителей:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<p class="parag_text_bold">Водители</p>

<div class="mileage_sm">
    <p class="parag_text">Возраст, лет:</p>

    <input class="mileage__next" name="comm" placeholder="Введите">
</div>

<div class="mileage_sm">
    <p class="parag_text">Стаж, лет:</p>

    <input class="mileage__next" name="comm" placeholder="Введите">
</div>

<div class="mileage_sm">
    <p class="parag_text">Или дата рождения:</p>

    <input class="mileage__next--sm" name="comm" placeholder="ДД">
    <input class="mileage__next--sm" name="comm" placeholder="ММ">
    <input class="mileage__next--sm" name="comm" placeholder="ГГГГ">
</div>

<div class="mileage_sm">
    <p class="parag_text">Или дата получения:</p>

    <input class="mileage__next--sm" name="comm" placeholder="ДД">
    <input class="mileage__next--sm" name="comm" placeholder="ММ">
    <input class="mileage__next--sm" name="comm" placeholder="ГГГГ">
</div>

<div class="select_type__driver">

    <p class="parag_text">Пол:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<div class="select_type__driver">

    <p class="parag_text">Семейное положение:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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


<div class="select_type__driver">

    <p class="parag_text">Дети:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

    <div class="save_plus--sm">
        <input type="checkbox" value="none" id="6">
        <label for="6">
                <span>
                    +
                </span>
        </label>
    </div>


<p class="parag_text_bold">Добавить водителя</p>


<div class="select_type__driver">

    <p class="parag_text">Охранная система:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<div class="select_type__driver">

    <p class="parag_text">Наличие системы автозапуска:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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


<div class="select_type__driver">

    <p class="parag_text">Иммобилайзер:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<div class="select_type__driver">

    <p class="parag_text">Поисково-спутниковая система:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

<div class="select_type__driver">

    <p class="parag_text">Механические противоугонные устройства:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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


<div class="select_type__driver">

    <p class="parag_text">Страховые риски:</p>

    <select class="select_type__driver--sel" name="type_disk">
        <option value="">Выберите</option>
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

</form>

<p class="parag_text">Варианты выплаты страхового возмещения:</p>

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

<form id="addForm" action="send_request" method="post">





    <div class="singleContent__desc">

        <label for="" style="width:100%; font-size:15px"">Контакты</label>
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите ФИО">
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите Ваш номер телефона">
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите e-mail">

        <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
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