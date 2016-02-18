<?php
use backend\modules\request_add_form\models\RequestAddForm;
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\AdditionalFields;
use frontend\widgets\CustomField;
use frontend\widgets\RegionSelect;
use yii\helpers\Html;

$this->title = "Добавить заявку";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $additionalFieldsields = AdditionalFields::find()->where(['group_id' => 15])->all();
//Debug::prn($additionalFieldsields);
?>
<section class="request_autoschool">
    <div class="contain_wr">
    <form id="addForm" action="send_request" method="post">
        <div class="singleContent__desc">
            <div class="addContent">
                <div class="singleContent__desc">
                    <div class="singleContent__desc--works">
                        <h3>Выберите категорию водительских прав:</h3>
                        <div class="prava_left">
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">M</span><span class="nameCateg">Мопеды и Квадроциклы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/M.png" alt="">
                                </div>
                                <span class="text_prava">Объем двигателя до 50 куб.см</span>
                                <span class="year">с 16 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_45" name="prava[]" value="45"/>

                        <label for="15_45" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">A1</span><span class="nameCateg">Легкие мотоциклы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/A1.png" alt="">
                                </div>
                                <span class="text_prava">Объем двигателя до 125 куб.см</span>
                                <span class="year">с 16 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_46" name="prava[]" value="46"/>

                        <label for="15_46" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">A</span><span class="nameCateg">Мотоциклы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/A.png" alt="">
                                </div>
                                <span class="text_prava">Объем двигателя свыше 125 куб.см</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_47" name="prava[]" value="47"/>

                        <label for="15_47" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">B1</span><span class="nameCateg">Трициклы и Квадроциклы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/B1.png" alt="">
                                </div>
                                <span class="text_prava">Объем двигателя свыше 50 куб.см</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_48" name="prava[]" value="48"/>

                        <label for="15_48" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">B</span><span class="nameCateg">Легковые автомобили</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/B.png" alt="">
                                </div>
                                <span class="text_prava">Полной массы до 3.5 т пассажирских мест до 8</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_140" name="prava[]" value="140"/>

                        <label for="15_140" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">BE</span><span class="nameCateg">Легковые автомобили</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/BE.png" alt="">
                                </div>
                                <span class="text_prava">С прицепом более 750кг</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_49" name="prava[]" value="49"/>

                        <label for="15_49" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">TB</span><span class="nameCateg">Троллейбус</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/TV.png" alt="">
                                </div>
                                <span class="text_prava"></span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_50" name="prava[]" value="50"/>

                        <label for="15_50" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">TM</span><span class="nameCateg">Трамвай</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/TM.png" alt="">
                                </div>
                                <span class="text_prava"></span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_131" name="prava[]" value="131"/>

                        <label for="15_131" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        </div>
                        <div class="prava_right">
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">С1</span><span class="nameCateg">"Легкие" грузовики</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/C1.png" alt="">
                                </div>
                                <span class="text_prava">Грузовики с полной массой менее 7.5. т</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_132" name="prava[]" value="132"/>

                        <label for="15_132" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">С1E</span><span class="nameCateg">"Легкие" грузовики</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/C1E.png" alt="">
                                </div>
                                <span class="text_prava">С прицепом массой более 750 кг</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_133" name="prava[]" value="133"/>

                        <label for="15_133" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">С</span><span class="nameCateg">Грузовики</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/C.png" alt="">
                                </div>
                                <span class="text_prava">Грузовики с полной массой более 7.5 т</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_134" name="prava[]" value="134"/>

                        <label for="15_134" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">СE</span><span class="nameCateg">Грузовики</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/CE.png" alt="">
                                </div>
                                <span class="text_prava">С прицепом массой более 750 кг</span>
                                <span class="year">с 18 лет</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_135" name="prava[]" value="135"/>

                        <label for="15_135" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">D1</span><span class="nameCateg">Малые автобусы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/D1.png" alt="">
                                </div>
                                <span class="text_prava">Число сидячих мест для пассажиров с 8 до 16</span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_136" name="prava[]" value="136"/>

                        <label for="15_136" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">D1E</span><span class="nameCateg">Малые автобусы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/D1E.png" alt="">
                                </div>
                                <span class="text_prava">С прицепом массой более 750 кг</span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_137" name="prava[]" value="137"/>

                        <label for="15_137" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">D</span><span class="nameCateg">Автобусы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/D.png" alt="">
                                </div>
                                <span class="text_prava">Число сидячих мест для пассажиров свыше 16</span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_138" name="prava[]" value="138"/>

                        <label for="15_138" class="request_label"><span></span></label>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="request--auto-school">
                            <div class="header--label">
                                <span class="categPrav">DE</span><span class="nameCateg">Автобусы</span>
                            </div>
                            <div class="infoCateg">
                                <div class="img_prava">
                                    <img src="/frontend/web/media/img/categoryprav/DE.png" alt="">
                                </div>
                                <span class="text_prava">С прицепом массой более 750 кг</span>
                                <span class="year">с 21 года</span>
                            </div>
                        </div>
                        <input type="checkbox" id="15_139" name="prava[]" value="139"/>

                        <label for="15_139" class="request_label"><span></span></label>
                        </div>

                        <?php
                        foreach ($groups as $group):
                            if($group->add_fields_group_id != 15):
                            $gr = AddFieldsGroup::find()->where(['id'=>$group->add_fields_group_id])->one();
                            ?>
                            <div class="singleContent__desc--works">
                                <h3><?= $gr->name ?></h3>
                                <?php $additionalFieldsields = AdditionalFields::find()->where(['group_id' => $gr->id])->all(); ?>
                                <?php
                                foreach ($additionalFieldsields as $s) {?>

                                    <input type="checkbox" id="<?=$gr->id."_".$s->id?>" <?php if($s->id == $select[$s->id]->add_field_id){echo 'checked';}?> name="<?= $gr->label ?>[]" value="<?= $s->id ?>"/>
                                    <label for="<?=$gr->id."_".$s->id?>"><span></span><?= $s->name ?></label>

                                <?php }

                                ?>
                            </div>

                            <?php
                            endif;
                        endforeach;
                        ?>
                        <h3>Ваш регион и город:</h3>
                        <?= RegionSelect::widget() ?>
                    </div>

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
                            echo "<div class='cleared'></div>";

                        }
                        echo Html::hiddenInput('request_type_id', $_GET['id']);
                        ?>


                </div>
            </div>
        </div>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>
    </form>
    </div>
</section>