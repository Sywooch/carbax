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


<div class="selection">

    <p class="parag_text">Выберите диаметр диска:</p>

    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_1" name="diskDiametr[]" value="13">
                <label class="text" for="11_1"><span></span>13”</label>

                <input type="checkbox" id="11_2" name="diskDiametr[]" value="14">
                <label class="text" for="11_2"><span></span>14”</label>

                <input type="checkbox" id="11_3" name="diskDiametr[]" value="15">
                <label class="text" for="11_3"><span></span>15”</label>

                <input type="checkbox" id="11_4" name="diskDiametr[]" value="16">
                <label class="text" for="11_4"><span></span>16”</label>

                <input type="checkbox" id="11_5" name="diskDiametr[]" value="17">
                <label class="text" for="11_5"><span></span>17”</label>

                <input type="checkbox" id="11_6" name="diskDiametr[]" value="18">
                <label class="text" for="11_6"><span></span>18”</label>

                <input type="checkbox" id="11_7" name="diskDiametr[]" value="19">
                <label class="text" for="11_7"><span></span>19”</label>

            </div>
        </div>
    </div>
    <div class="selection__content--lg">

        <div class="singleContent__desc">
            <div class="singleContent__desc--works">

                <input type="checkbox" id="11_8" name="diskDiametr[]" value="20">
                <label class="text" for="11_8"><span></span>20”</label>

                <input type="checkbox" id="11_9" name="diskDiametr[]" value="21">
                <label class="text" for="11_9"><span></span>21”</label>

                <input type="checkbox" id="11_10" name="diskDiametr[]" value="22">
                <label class="text" for="11_10"><span></span>22”</label>

                <input type="checkbox" id="11_11" name="diskDiametr[]" value="23">
                <label class="text" for="11_11"><span></span>23”</label>

                <input type="checkbox" id="11_12" name="diskDiametr[]" value="24">
                <label class="text" for="11_12"><span></span>24”</label>

                <input type="checkbox" id="11_13" name="diskDiametr[]" value="25">
                <label class="text" for="11_13"><span></span>25”</label>

                <input type="checkbox" id="11_14" name="diskDiametr[]" value="26">
                <label class="text" for="11_14"><span></span>26”</label>


            </div>
        </div>

    </div>

</div>
    <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>

    <div class="cleared"></div>
    <h3>Ваш регион и город:</h3>
    <?= RegionSelect::widget() ?>

    <div class="singleContent__desc">

        <label for="addContent__description" style="width:100%">Комментарии</label>
        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии"></textarea>

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