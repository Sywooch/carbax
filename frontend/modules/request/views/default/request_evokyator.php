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

<!--<p class="parag_text" style="margin-top: 25px;">Выберите марку автомобиля:</p>

<div class="selection" style="margin-bottom: 50px;">

    <div class="selection__width">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_39" name="disk[]" value="39">
                <label class="text" for="11_39"><span></span>Audi</label>

                <input type="checkbox" id="11_40" name="disk[]" value="40">
                <label class="text" for="11_40"><span></span>BMW</label>

                <input type="checkbox" id="11_41" name="disk[]" value="41">
                <label class="text" for="11_41"><span></span>KIA</label>

                <input type="checkbox" id="11_42" name="disk[]" value="42">
                <label class="text" for="11_42"><span></span>FORD</label>

                <input type="checkbox" id="11_43" name="disk[]" value="43">
                <label class="text" for="11_43"><span></span>TOYOTA</label>

                <input type="checkbox" id="11_44" name="disk[]" value="44">
                <label class="text" for="11_44"><span></span>SKODA</label>

                <input type="checkbox" id="11_44" name="disk[]" value="44">
                <label class="text" for="11_44"><span></span>NISSAN</label>


            </div>
        </div>
    </div>
    <div class="selection__width">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_45" name="disk[]" value="45">
                <label class="text" for="11_45"><span></span>LADA</label>

                <input type="checkbox" id="11_46" name="disk[]" value="46">
                <label class="text" for="11_46"><span></span>RENO</label>

                <input type="checkbox" id="11_47" name="disk[]" value="47">
                <label class="text" for="11_47"><span></span>PEGO</label>

                <input type="checkbox" id="11_48" name="disk[]" value="48">
                <label class="text" for="11_48"><span></span>LEXUS</label>

                <input type="checkbox" id="11_49" name="disk[]" value="49">
                <label class="text" for="11_49"><span></span>SUZUKI</label>

                <input type="checkbox" id="11_50" name="disk[]" value="50">
                <label class="text" for="11_50"><span></span>HONDA</label>

                <input type="checkbox" id="11_51" name="disk[]" value="51">
                <label class="text" for="11_51"><span></span>SUBARU</label>

            </div>
        </div>
    </div>
    <div class="selection__width">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_52" name="disk[]" value="52">
                <label class="text" for="11_53"><span></span>LADA</label>

                <input type="checkbox" id="11_53" name="disk[]" value="53">
                <label class="text" for="11_53"><span></span>RENO</label>

                <input type="checkbox" id="11_54" name="disk[]" value="54">
                <label class="text" for="11_54"><span></span>PEGO</label>

                <input type="checkbox" id="11_55" name="disk[]" value="55">
                <label class="text" for="11_55"><span></span>LEXUS</label>

                <input type="checkbox" id="11_56" name="disk[]" value="56">
                <label class="text" for="11_56"><span></span>SUZUKI</label>

                <input type="checkbox" id="11_57" name="disk[]" value="57">
                <label class="text" for="11_57"><span></span>HONDA</label>

                <input type="checkbox" id="11_58" name="disk[]" value="59">
                <label class="text" for="11_58"><span></span>SUBARU</label>

            </div>
        </div>
    </div>
    <div class="selection__width">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_59" name="disk[]" value="59">
                <label class="text" for="11_59"><span></span>LADA</label>

                <input type="checkbox" id="11_60" name="disk[]" value="60">
                <label class="text" for="11_60"><span></span>RENO</label>

                <input type="checkbox" id="11_61" name="disk[]" value="61">
                <label class="text" for="11_61"><span></span>PEGO</label>

                <input type="checkbox" id="11_62" name="disk[]" value="62">
                <label class="text" for="11_62"><span></span>LEXUS</label>

                <input type="checkbox" id="11_63" name="disk[]" value="63">
                <label class="text" for="11_63"><span></span>SUZUKI</label>

                <input type="checkbox" id="11_64" name="disk[]" value="64">
                <label class="text" for="11_64"><span></span>HONDA</label>

                <input type="checkbox" id="11_65" name="disk[]" value="65">
                <label class="text" for="11_65"><span></span>SUBARU</label>

            </div>
        </div>
    </div>
</div>-->

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

   <!-- <div class="requestAddFieldGroup">
        <?php /*echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); */?>
    </div>-->
    <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию"></textarea>
        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>
        <label for="" style="width:100%; font-size:15px">Контакты</label>
        <input type="text" id="" class="addContent__text" name="fio" value="" placeholder="Введите ФИО">
        <input type="text" id="" class="addContent__text" name="tel" value="" placeholder="Введите Ваш номер телефона">
        <input type="text" id="" class="addContent__text" name="email" value="" placeholder="Введите e-mail">

        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->