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


<p class="parag_text">Выберите тип кузова Вашего транспортного срества</p>

<div class="save_xs">
    <input type="checkbox" value="none" id="5" class="requestBodyType">
    <label for="5">
                <span>
                    Седан
                </span>
    </label>
    <input type="checkbox" value="none" id="6" class="requestBodyType">
    <label for="6">
                <span>
                   Хэтчбек
                </span>
    </label>
    <input type="checkbox" value="none" id="7" class="requestBodyType">
    <label for="7">
                <span>
                    Универсал
                </span>
    </label>
    <input type="checkbox" value="none" id="8" class="requestBodyType">
    <label for="8">
                <span>
                    Лифтбэк
                </span>
    </label>
    <input type="checkbox" value="none" id="9" class="requestBodyType">
    <label for="9">
                <span>
                    Купе
                </span>
    </label>
    <input type="checkbox" value="none" id="10" class="requestBodyType">
    <label for="10">
                <span>
                    Кабриолет
                </span>
    </label>
    <input type="checkbox" value="none" id="11" class="requestBodyType">
    <label for="11">
                <span>
                    Родстер
                </span>
    </label>
    <input type="checkbox" value="none" id="12" class="requestBodyType">
    <label for="12">
                <span>
                    Тарга
                </span>
    </label>
    <input type="checkbox" value="none" id="13" class="requestBodyType">
    <label for="13">
                <span>
                    Лимузин
                </span>
    </label>
    <input type="checkbox" value="none" id="14" class="requestBodyType">
    <label for="14">
                <span>
                    Стретч
                </span>
    </label>
    <input type="checkbox" value="none" id="15" class="requestBodyType">
    <label for="15">
                <span>
                    Внедорожник
                </span>
    </label>
    <input type="checkbox" value="none" id="16" class="requestBodyType">
    <label for="16">
                <span>
                    Кроссовер
                </span>
    </label>
    <input type="checkbox" value="none" id="17" class="requestBodyType">
    <label for="17">
                <span>
                    Пикап
                </span>
    </label>
    <input type="checkbox" value="none" id="18" class="requestBodyType">
    <label for="18">
                <span>
                    Фургон
                </span>
    </label>
    <input type="checkbox" value="none" id="19" class="requestBodyType">
    <label for="19">
                <span>
                    Микроавтобус
                </span>
    </label>
</div>


<!--<div class="selection">
    <p class="parag_text">Дополнительно:</p>

    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_1" name="disk[]" value="1">
                <label class="text" for="11_1"><span></span>Автоматическая портальная мойка</label>

                <input type="checkbox" id="11_2" name="disk[]" value="2">
                <label class="text" for="11_2"><span></span>Влажная уборка салона</label>

                <input type="checkbox" id="11_3" name="disk[]" value="3">
                <label class="text" for="11_3"><span></span>Воск</label>

                <input type="checkbox" id="11_4" name="disk[]" value="4">
                <label class="text" for="11_4"><span></span>Горячий воск</label>

                <input type="checkbox" id="11_5" name="disk[]" value="5">
                <label class="text" for="11_5"><span></span>Комплекс предпродажной подготовки</label>

                <input type="checkbox" id="11_6" name="disk[]" value="6">
                <label class="text" for="11_6"><span></span>Кондиционер кожи</label>

                <input type="checkbox" id="11_7" name="disk[]" value="7">
                <label class="text" for="11_7"><span></span>Мойка двигателя</label>

                <input type="checkbox" id="11_8" name="disk[]" value="8">
                <label class="text" for="11_8"><span></span>Мойка кузова</label>

                <input type="checkbox" id="11_9" name="disk[]" value="9">
                <label class="text" for="11_9"><span></span>Нанесение жидкого воска</label>

                <input type="checkbox" id="11_10" name="disk[]" value="10">
                <label class="text" for="11_10"><span></span>Натирка бамперов</label>

                <input type="checkbox" id="11_11" name="disk[]" value="11">
                <label class="text" for="11_11"><span></span>Натирка внутреннего пластика</label>

                <input type="checkbox" id="11_12" name="disk[]" value="12">
                <label class="text" for="11_12"><span></span>Натирка наружного пластика</label>

                <input type="checkbox" id="11_13" name="disk[]" value="13">
                <label class="text" for="11_13"><span></span>Обработка уплотнений антизамерзающим силиконом</label>

                <input type="checkbox" id="11_14" name="disk[]" value="14">
                <label class="text" for="11_14"><span></span>Очистка от битума</label>


            </div>
        </div>
    </div>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_15" name="disk[]" value="15">
                <label class="text" for="11_15"><span></span>Очистка от мошки</label>

                <input type="checkbox" id="11_16" name="disk[]" value="16">
                <label class="text" for="11_16"><span></span>Полировка кузова</label>

                <input type="checkbox" id="11_17" name="disk[]" value="17">
                <label class="text" for="11_17"><span></span>Стирка ковриков</label>

                <input type="checkbox" id="11_18" name="disk[]" value="18">
                <label class="text" for="11_18"><span></span>Техническая мойка кузова (без пены и сушки)</label>

                <input type="checkbox" id="11_19" name="disk[]" value="19">
                <label class="text" for="11_19"><span></span>Химчистка дисков</label>

                <input type="checkbox" id="11_20" name="disk[]" value="20">
                <label class="text" for="11_20"><span></span>Химчистка багажного отделения</label>

                <input type="checkbox" id="11_21" name="disk[]" value="21">
                <label class="text" for="11_21"><span></span>Химчистка салона</label>

                <input type="checkbox" id="11_22" name="disk[]" value="22">
                <label class="text" for="11_22"><span></span>Чернение резины</label>

                <input type="checkbox" id="11_23" name="disk[]" value="23">
                <label class="text" for="11_23"><span></span>Чистка багажника (пылесос)</label>

                <input type="checkbox" id="11_24" name="disk[]" value="24">
                <label class="text" for="11_24"><span></span>Чистка салона (влыжная уборка)</label>

                <input type="checkbox" id="11_25" name="disk[]" value="25">
                <label class="text" for="11_25"><span></span>Чистка салона (пылесос)</label>

                <input type="checkbox" id="11_26" name="disk[]" value="26">
                <label class="text" for="11_26"><span></span>Чистка стекол внутри</label>

                <input type="checkbox" id="11_27" name="disk[]" value="27">
                <label class="text" for="11_27"><span></span>Читска стекол снаружи</label>

                <input type="checkbox" id="11_28" name="disk[]" value="28">
                <label class="text" for="11_28"><span></span>Экспресс мойка (без сушки)</label>

            </div>
        </div>

    </div>
</div>-->

<!--<div class="addContent">
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
</div>-->

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

            <label for="addContent__description" style="width:100%">Комментарии</label>
            <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии">

            </textarea>


            <div class="send">
                <a class="send_foto" href="#">Добавить фото</a>
            </div>

            <div class="addContent--save">
                <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
            </div>
        </div>-->
    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>
    <div class="singleContent__desc">
        <?php
        foreach ($addForm as $f) {
            $k = RequestAddForm::find()->where(['id' => $f->add_form_id])->one();
            echo CustomField::widget([
                'name' => $k->key,
                'template' => $k->template,
                'inputOption' => ['class' => $k->class, 'id' => $k->input_id, 'placeholder' => $k->placeholder],
                'labelOption' => ['for' => $k->input_id, 'style' => 'width:100%'],
                'labelName' => $k->name,
                'type' => ($k->form_type == 0) ? 'input' : 'textarea'
            ]);

        }

        ?>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>
    </div>
</form>
</section>

<!----AKD47 section end---->