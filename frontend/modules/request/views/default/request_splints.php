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

        <p class="parag_text">выберите автомобиль из <span>гаража:</span></p>

        <p class="parag_text"><span>у вас нет машин в гараже</span></p>

        <p class="parag_text">Выберите тип Вашего транспортного срества</p>

        <div class="save">
            <input type="checkbox" value="none" id="a">
            <label for="a">
                <span>
                    Легковой автомобиль
                </span>
            </label>
            <input type="checkbox" value="none" id="b">
            <label for="b">
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

        <div class="selection">


            <div class=" selection__content">

                <div class="singleContent__desc">
                    <div class="singleContent__desc--works">
                        <p class="parag_text">Выберите:</p>
                        <input type="checkbox" id="11_39" name="disk[]" value="39">
                        <label class="text" for="11_39"><span></span>В наличии</label>

                        <input type="checkbox" id="11_40" name="disk[]" value="40">
                        <label class="text" for="11_40"><span></span>Гарантия производителя</label>

                        <input type="checkbox" id="11_41" name="disk[]" value="41">
                        <label class="text" for="11_41"><span></span>Run on Flat</label>

                        <input type="checkbox" id="11_42" name="disk[]" value="42">
                        <label class="text" for="11_42"><span></span>Распродажа</label>


                    </div>
                </div>
            </div>
            <div class=" selection__content">

                <div class="singleContent__desc">
                    <div class="singleContent__desc--works">
                        <p class="parag_text">Сезон:</p>
                        <input type="checkbox" id="11_43" name="disk[]" value="43">
                        <label class="text" for="11_43"><span></span>Летние</label>

                        <input type="checkbox" id="11_44" name="disk[]" value="44">
                        <label class="text" for="11_44"><span></span>Зимние</label>

                        <input type="checkbox" id="11_45" name="disk[]" value="45">
                        <label class="text" for="11_45"><span></span>Всесезонные</label>

                    </div>
                </div>
            </div>
            <div class=" selection__content">

                <div class="singleContent__desc">
                    <div class="singleContent__desc--works">
                        <p class="parag_text">Шипы:</p>
                        <input type="checkbox" id="11_46" name="disk[]" value="46">
                        <label class="text" for="11_46"><span></span>С шипами</label>

                        <input type="checkbox" id="11_47" name="disk[]" value="47">
                        <label class="text" for="11_47"><span></span>Без шипов</label>

                    </div>
                </div>
            </div>
        </div>


        <p class="parag_text">Производитель:</p>


        <div class="select_type__manufacturer">
            <select class="select_type__manufacturer--sel" name="type_disk">
                <option value="">Выбирите производителя</option>
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

        <div></div>
        <div></div>

<!--        <h3>Ваш регион и город:</h3>-->
<!--        --><?//= RegionSelect::widget() ?>
<!--        <span id="selectAuto">-->
<!--            --><?php
//            if ($requestType->view_widget_auto == 1) {
//                echo SelectAuto::widget(['view' => $requestType->view_category_auto,'select_from_garage'=>true]);
//            }
//
//            if($requestType->view_mark_auto == 1){
//                echo Html::dropDownList(
//                    'typeAuto',
//                    0,
//                    ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=>'Мото транспорт'],
//                    ['prompt' => 'Выберите тип авто', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto', 'required' => 'required']
//                );
//            }
//            ?>
<!---->
<!--        </span>-->

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
        <div class="view_widget">
            <div class="requestDiametr__next">
                <?php
                echo Html::label('Ширина профиля:');
                echo Html::dropDownList('section_width',$model->section_width,$section_width,['prompt'=>'-','class'=>'addContent__adress requestWidthProfil']);
                ?>
            </div>
            <div class="requestDiametr__next">
                <?php
                echo Html::label('Высота профиля:');
                echo Html::dropDownList('section_height',$model->section_height,$section_height,['prompt'=>'-','class'=>'addContent__adress requestHeightProfile']);
                ?>
            </div>


            <div class="requestDiametr__next">
                <?php
                    echo Html::label('Диаметр профиля:');
                    echo Html::dropDownList('diameter',$model->diameter,$diameter,['prompt'=>'-','class'=>'addContent__adress']);
                ?>
            </div>
<!--            <div class="requestDiametr">-->
<!--                --><?php
//                    echo Html::label('Сезонность');
//                    echo Html::dropDownList('seasonality',$model->seasonality,['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'-','class'=>'addContent__adress requestSeasons']);
//                ?>
<!--            </div>-->

        </div>
<!--        <div class="requestAddFieldGroup">-->
<!--            --><?php //echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]);?>
<!--        </div>-->

                <div class="selection">


                    <div class=" selection__content">

                        <div class="singleContent__desc">
                            <div class="singleContent__desc--works">
                                <p class="parag_text">Выберите тип обслуживания:</p>
                                <input type="checkbox" id="11_48" name="disk[]" value="48">
                                <label class="text" for="11_48"><span></span>с установкой</label>

                                <input type="checkbox" id="11_49" name="disk[]" value="49">
                                <label class="text" for="11_49"><span></span>без Установки</label>


                            </div>
                        </div>
                    </div>
                    <div class=" selection__content">

                        <div class="singleContent__desc">
                            <div class="singleContent__desc--works">
                                <p class="parag_text">Выберите остояние:</p>
                                <input type="checkbox" id="11_50" name="disk[]" value="50">
                                <label class="text" for="11_50"><span></span>новое</label>

                                <input type="checkbox" id="11_51" name="disk[]" value="51">
                                <label class="text" for="11_52"><span></span>Б/У</label>


                            </div>
                        </div>
                    </div>
                    <div class=" selection__content">

                        <div class="singleContent__desc">
                            <div class="singleContent__desc--works">
                                <p class="parag_text">Способы оплаты:</p>
                                <input type="checkbox" id="11_53" name="disk[]" value="53">
                                <label class="text" for="11_53"><span></span>Наличные</label>

                                <input type="checkbox" id="11_54" name="disk[]" value="54">
                                <label class="text" for="11_54"><span></span>Карточка</label>

                                <input type="checkbox" id="11_55" name="disk[]" value="55">
                                <label class="text" for="11_55"><span></span>банковский перевод</label>

                            </div>
                        </div>
                    </div>
                </div>

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


        <?php echo Html::hiddenInput('request_type_id', $_GET['id']); ?>



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
            <div class="send">
            <a class="send_foto" href="#">Добавить фото</a>
            </div>
        </div>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить заявку</a>
        </div>
    </form>
</section>

<!----AKD47 section end---->