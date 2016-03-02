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


<div class="mileage_sm">
    <p class="parag_text">Дата начала эксплуатации:</p>

    <input class="mileage__next" name="dateStart" placeholder="Введите дату хх.хх.хххх">
</div>


<div class="mileage_sm">
    <p class="parag_text">Количество лошадиных сил:</p>

    <input class="mileage__next" name="kol_Cil" placeholder="Введите ">

</div>

<div class="mileage_sm">
    <p class="parag_text">Пробег:</p>

    <input class="mileage__next probeg" name="probeg" placeholder="Введите значение">
</div>

<div class="mileage_sm">
    <p class="parag_text">Страховая сумма:</p>

    <input class="mileage__next" name="summaStrah" placeholder="Введите значение">
</div>



<div class="select_type__driver">

    <p class="parag_text">Автомобиль куплен в кредит?</p>

    <select class="select_type__driver--sel" name="kredit">
        <option value="">Выберите</option>
        <option value="Да">Да</option>
        <option value="Нет">Нет</option>
    </select>
</div>

<div class="select_type__driver">

    <p class="parag_text">Коробка передач:</p>

    <select class="select_type__driver--sel" name="kpp">
        <option value="">Выберите</option>
        <option value="Механика">Механика</option>
        <option value="Автомат">Автомат</option>
        <option value="Робот">Робот</option>
        <option value="Вариатор">Вариатор</option>
    </select>
</div>


<!--<div class="select_type__driver">

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
</div>-->
    <div class="cleared"></div>
<p class="parag_text_bold p--left">Водители</p>
    <div class="selection__content--lg" id="drivebo">
        <div class="singleContent__desc">
            <div class="singleContent__desc--works">
                <input type="checkbox" id="driveboch" name="drivebo" value="1">
                <label class="text" for="driveboch"><span></span>без ограничений</label>
            </div>
        </div>
    </div>
    <div class="cleared"></div>
    <div class="driveInfoWr">
        <div class="mileage_sm">
            <p class="parag_text">Возраст, лет:</p>

            <input class="mileage__next" name="driveInfo[1][year]" placeholder="Введите">
        </div>

        <div class="mileage_sm">
            <p class="parag_text">Стаж, лет:</p>

            <input class="mileage__next" name="driveInfo[1][stag]" placeholder="Введите">
        </div>

        <div class="mileage_sm">
            <p class="parag_text">Или дата рождения:</p>

            <input class="mileage__next--sm" name="driveInfo[1][datarozgd][]" placeholder="ДД">
            <input class="mileage__next--sm" name="driveInfo[1][datarozgd][]" placeholder="ММ">
            <input class="mileage__next--sm" name="driveInfo[1][datarozgd][]" placeholder="ГГГГ">
        </div>

        <div class="mileage_sm">
            <p class="parag_text">Или дата получения:</p>

            <input class="mileage__next--sm" name="driveInfo[1][datapol][]" placeholder="ДД">
            <input class="mileage__next--sm" name="driveInfo[1][datapol][]" placeholder="ММ">
            <input class="mileage__next--sm" name="driveInfo[1][datapol][]" placeholder="ГГГГ">
        </div>

        <div class="select_type__driver">

            <p class="parag_text">Пол:</p>

            <select class="select_type__driver--sel" name="driveInfo[1][pol]">
                <option value="">Выберите</option>
                <option value="Мужской">Мужской</option>
                <option value="Женский">Женский</option>
            </select>
        </div>

        <div class="select_type__driver">

            <p class="parag_text">Семейное положение:</p>

            <select class="select_type__driver--sel" name="driveInfo[1][pologenie]">
                <option value="">Выберите</option>
                <option value="Женат/Замужем">Женат/Замужем</option>
                <option value="Холост">Холост</option>
            </select>
        </div>


        <div class="select_type__driver">

            <p class="parag_text">Дети:</p>

            <select class="select_type__driver--sel" name="driveInfo[1][deti]">
                <option value="">Выберите</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="более">более</option>
            </select>
        </div>
    </div>
    <div class="cleared"></div>
    <span id="driveinfo" data-count="1"></span>
    <div class="save_plus--sm--wr">
        <div class="save_plus--sm">
            <span class="add_infoDriver">
                +
            </span>
        </div>
        <p class="parag_text_bold addInfoDrive">Добавить водителя</p>
    </div>





<div class="select_type__driver">

    <p class="parag_text">Охранная система:</p>

    <select class="select_type__driver--sel" name="securitySystem">
        <option value="">Выберите</option>
        <option value="Есть">Есть</option>
        <option value="Нет">Нет</option>
    </select>
</div>

<div class="select_type__driver">

    <p class="parag_text">Наличие системы автозапуска:</p>

    <select class="select_type__driver--sel" name="autoloadSystem">
        <option value="">Выберите</option>
        <option value="Есть">Есть</option>
        <option value="Нет">Нет</option>
    </select>
</div>


<div class="select_type__driver">

    <p class="parag_text">Иммобилайзер:</p>

    <select class="select_type__driver--sel" name="imobilaizer">
        <option value="">Выберите</option>
        <option value="Есть">Есть</option>
        <option value="Нет">Нет</option>
    </select>
</div>

<div class="select_type__driver">

    <p class="parag_text">Поисково-спутниковая система:</p>

    <select class="select_type__driver--sel" name="poiskspytniksystem">
        <option value="">Выберите</option>
        <option value="Есть">Есть</option>
        <option value="Нет">Нет</option>
    </select>
</div>

<div class="select_type__driver">

    <p class="parag_text">Механические противоугонные устройства:</p>

    <select class="select_type__driver--sel" name="mexprotivygon">
        <option value="">Выберите</option>
        <option value="Есть">Есть</option>
        <option value="Нет">Нет</option>
    </select>
</div>


<!--<div class="select_type__driver">
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
</div>-->



<!--<p class="parag_text">Варианты выплаты страхового возмещения:</p>

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

        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>
        <label for="" style="width:100%; font-size:15px">Контакты</label>
        <input type="text" id="" class="addContent__text" name="fio" value="" placeholder="Введите ФИО">
        <input type="text" id="" class="addContent__text" name="tel" value="" placeholder="Введите Ваш номер телефона">
        <input type="text" id="" class="addContent__text" name="email" value="" placeholder="Введите e-mail">

        <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию"></textarea>


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