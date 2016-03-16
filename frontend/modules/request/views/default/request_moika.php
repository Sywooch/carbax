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
<h1>Заявка на мойку</h1>
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
            <select class="addContent__adress requestMarkAuto" name="requestMarkAuto" required="required">
                <option value="">Марка</option>
            </select>
        </div>
        <div class="select_type requestModelAuto">
            <select class="addContent__adress requestModelAuto" name="requestModelAuto" required="required">
                <option value="">Модель</option>
            </select>
        </div>
        <div class="select_type requestYear">
            <select class="addContent__adress requestYear" name="requestYear" required="required">
                <option value="">Год выпуска</option>
            </select>
        </div>
    </div>


<p class="parag_text">Выберите тип кузова Вашего транспортного срества</p>

<div class="save_xs">
    <input type="checkbox" name="bodyAuto" value="1" id="bodyAuto1" class="requestBodyType">
    <label for="bodyAuto1">
                <span>
                    Седан
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="2" id="bodyAuto2" class="requestBodyType">
    <label for="bodyAuto2">
                <span>
                   Хэтчбек
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="3" id="bodyAuto3" class="requestBodyType">
    <label for="bodyAuto3">
                <span>
                    Универсал
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="13" id="bodyAuto13" class="requestBodyType">
    <label for="bodyAuto13">
                <span>
                    Лифтбэк
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="7" id="bodyAuto7" class="requestBodyType">
    <label for="bodyAuto7">
                <span>
                    Купе
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="5" id="bodyAuto5" class="requestBodyType">
    <label for="bodyAuto5">
                <span>
                    Кабриолет
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="15" id="bodyAuto15" class="requestBodyType">
    <label for="bodyAuto15">
                <span>
                    Родстер
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="14" id="bodyAuto14" class="requestBodyType">
    <label for="bodyAuto14">
                <span>
                    Тарга
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="8" id="bodyAuto8" class="requestBodyType">
    <label for="bodyAuto8">
                <span>
                    Лимузин
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="9" id="bodyAuto9" class="requestBodyType">
    <label for="bodyAuto9">
                <span>
                    Стретч
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="4" id="bodyAuto4" class="requestBodyType">
    <label for="bodyAuto4">
                <span>
                    Внедорожник
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="6" id="bodyAuto6" class="requestBodyType">
    <label for="bodyAuto6">
                <span>
                    Кроссовер
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="10" id="bodyAuto10" class="requestBodyType">
    <label for="bodyAuto10">
                <span>
                    Пикап
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="11" id="bodyAuto11" class="requestBodyType">
    <label for="bodyAuto11">
                <span>
                    Фургон
                </span>
    </label>
    <input type="checkbox" name="bodyAuto" value="12" id="bodyAuto12" class="requestBodyType">
    <label for="bodyAuto12">
                <span>
                    Микроавтобус
                </span>
    </label>
</div>






    <div class="requestAddFieldGroupMoika">
        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    </div>





   <!-- <p class="parag_text">Ваш регион: <span>Москва</span>. Добавить еще регион</p>

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


        <!--<div class="singleContent__desc">

            <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
            <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию">

            </textarea>


            <div class="send">
                <a class="send_foto" href="#">Добавить фото</a>
            </div>

            <div class="addContent--save">
                <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
            </div>
        </div>-->

    <div class="cleared"></div>
    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">
        <label for="addContent__description" style="width:100%">Комментарии</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии" required="required"></textarea>

        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>
        <!--<div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>-->
        <div class="addContent--save">
            <input type="submit" value="Отправить" class="btn btn-save" id="sendReq">
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->