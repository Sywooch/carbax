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

<p class="parag_text">Выберите тип Вашего транспортного срества</p>

<div class="selection">



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
</div>

<form id="addForm" action="send_request" method="post">

    <div></div>
    <div></div>

    <?php
    $diameter = [];
    for($i=7;$i<=30;$i++){
        $diameter[$i] = $i;
    }

    $section_width = [];
    for($i=60;$i<=395;$i+=5){
        $section_width[$i] = $i;
    }

    $section_height = [];
    for($i=25;$i<=110;$i+=5){
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

        <textarea id="addContent__description" class="addContent__description" name="comm" placeholder="Комментарии"></textarea>


        <label for="" style="width:100%">Контакты</label>
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите ФИО">
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите Ваш номер телефона">
        <input type="text" id="" class="addContent__text" name="title" value="" placeholder="Введите e-mail">
    </div>


    <div class="addContent--save">
        <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
    </div>
</form>
</section>

<!----AKD47 section end---->