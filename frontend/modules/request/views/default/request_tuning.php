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
<h1>Заявка на тюнинг</h1>
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


    <!--<div class="selection">
        <p class="parag_text">Виды работ:</p>

        <div class="selection__content--lg">
                       <div class="singleContent__desc">
                <div class="singleContent__desc--works">

                    <input type="checkbox" id="11_1" name="disk[]" value="1">
                    <label class="text" for="11_1"><span></span>Пошив салона</label>

                    <input type="checkbox" id="11_2" name="disk[]" value="2">
                    <label class="text" for="11_2"><span></span>Тюнинг</label>

                    <input type="checkbox" id="11_3" name="disk[]" value="3">
                    <label class="text" for="11_3"><span></span>Выхлопные системы</label>

                    <input type="checkbox" id="11_4" name="disk[]" value="4">
                    <label class="text" for="11_4"><span></span>Кузовной ремон</label>

                    <input type="checkbox" id="11_5" name="disk[]" value="5">
                    <label class="text" for="11_5"><span></span>Оклейка пленкой</label>

                    <input type="checkbox" id="11_6" name="disk[]" value="6">
                    <label class="text" for="11_6"><span></span>Автозвук</label>

                    <input type="checkbox" id="11_7" name="disk[]" value="7">
                    <label class="text" for="11_7"><span></span>Офисы на колесах</label>

                </div>
            </div>
        </div>
        <div class="selection__content--lg">

            <div class="singleContent__desc">
                <div class="singleContent__desc--works">

                    <input type="checkbox" id="11_8" name="disk[]" value="8">
                    <label class="text" for="11_8"><span></span>Охранные системы</label>

                    <input type="checkbox" id="11_9" name="disk[]" value="9">
                    <label class="text" for="11_9"><span></span>Покраска автомобилей</label>

                    <input type="checkbox" id="11_10" name="disk[]" value="10">
                    <label class="text" for="11_10"><span></span>Полировка кузова</label>

                    <input type="checkbox" id="11_11" name="disk[]" value="11">
                    <label class="text" for="11_11"><span></span>Разработка дизайна</label>

                    <input type="checkbox" id="11_12" name="disk[]" value="12">
                    <label class="text" for="11_12"><span></span>Ремонт бамперов</label>

                    <input type="checkbox" id="11_13" name="disk[]" value="13">
                    <label class="text" for="11_13"><span></span>Ремонт вмятин без покраски</label>

                    <input type="checkbox" id="11_14" name="disk[]" value="14">
                    <label class="text" for="11_14"><span></span>Шумоизоляция</label>

                </div>
            </div>
        </div>
    </div>

    <div class="selection" style="margin-bottom: 30px">


        <div class="selection__content--lg">
            <p class="parag_text">Продажа запчастей:</p>
            <div class="singleContent__desc">

                <div class="singleContent__desc--works">

                    <input type="checkbox" id="11_15" name="disk[]" value="15">
                    <label class="text" for="11_15"><span></span>Наличные</label>

                    <input type="checkbox" id="11_16" name="disk[]" value="16">
                    <label class="text" for="11_16"><span></span>Карточка</label>

                    <input type="checkbox" id="11_17" name="disk[]" value="17">
                    <label class="text" for="11_17"><span></span>Банковский перевод</label>

                </div>
            </div>
        </div>
        <div class="selection__content--lg">
            <p class="parag_text">Способы оплаты:</p>
               <div class="singleContent__desc">

                <div class="singleContent__desc--works">

                    <input type="checkbox" id="11_18" name="disk[]" value="18">
                    <label class="text" for="11_18"><span></span>Наличные</label>

                    <input type="checkbox" id="11_19" name="disk[]" value="19">
                    <label class="text" for="11_19"><span></span>Карточка</label>

                    <input type="checkbox" id="11_20" name="disk[]" value="20">
                    <label class="text" for="11_20"><span></span>Банковский перевод</label>


                </div>
            </div>

        </div>

    </div>-->

    <div class="requestAddFieldGroupMoika">
        <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
    </div>

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
    <div class="cleared"></div>

    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>

    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%; font-size:15px">Комментарии:</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Введите всю дополнительную информацию"></textarea>
        <?php echo Html::hiddenInput('request_type_id', $_GET['id']);?>
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