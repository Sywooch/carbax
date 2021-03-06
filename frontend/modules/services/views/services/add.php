<?php
use common\classes\Debug;
use frontend\modules\services\widgets\GetAllGroupById;
use frontend\widgets\AutoType;
use frontend\widgets\ComfortZone;
use frontend\widgets\SelectAddress;
use frontend\widgets\SelectMultiplayAuto;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = "Добавить сервис";

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои сервисы', 'url' => ['select_service']];
$this->params['breadcrumbs'][] = ['label' => \common\models\db\ServiceType::findOne($_GET['service_type'])->name, 'url' => ['services/my_services','service_type'=>$_GET['service_type']]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
?>

<div class="addContent">

    <form id="addForm" action="add_to_sql" method="post" enctype="multipart/form-data">
        <input type="hidden" id="service_type_id" name="service_type" value="<?= $_GET['service_type'] ?>">
        <input type="text" name="title" class="addContent__title" placeholder="Название автосервиса" required>

        <input type="text" id="address_0" name="address[0][title]" class="addContent__adress addressEvent" placeholder="Адрес автосервиса" required>

        <span id="firstAddress"></span>
        <a href="#nowhere" id="addAddress" class="addContent__adress-add">+</a>
        <div class="singleContent__map">
            <div id="map" style="width: 100%; height: 100%"></div>
        </div>
        <div class="singleContent__desc">

            <!--<h2>Добавить логотип компании</h2>
            --><?php
/*            echo '<label class="control-label">Добавить фото</label>';
            echo FileInput::widget([
                'name' => 'file',
                'id' => 'input-4',
                'attribute' => 'attachment_1',
                'value' => '/media/img/1.png',
                'options' => ['multiple' => false,
                    'language'=> "ru",
                    'showCaption'=> true,
                    'maxFileCount'=> 1,
                    'showRemove'=> false,
                    'showUpload'=> false],
            ]);
            */?>

            <?php
            echo '<label class="control-label">Добавить фото</label>';
            echo FileInput::widget([
                'name' => 'file[]',
                'id' => 'input-5',
                'attribute' => 'attachment_1',
                'value' => '/media/img/1.png',
                'options' => [
                    'multiple' => true,
                    'showCaption' => false,
                    /*'showRemove' => true,*/
                    'showUpload' => false,
                    'uploadAsync'=> false,
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/ajax/ajax/upload_file_services']),
                    'maxFileCount' => 6,
                    'language' => "ru",
                    'uploadAsync'=> false,
                    'showUpload' => false,
                    'dropZoneEnabled' => false
                ],
            ]);
            ?>

            <h3>Описание</h3>
            <textarea name="text" id="addContent__description"  class="addContent__description" required="required"></textarea>

            <h3>Время работы</h3>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-mo" name="openTime[mo][day]" />
                    <label for="checkbox-mo"><span></span>Пн</label>
                </div>
                <input id="datetimepicker_from-mo" type="text" class="addContent__time" name="openTime[mo][from]"> -
                <input id="datetimepicker_to-mo" type="text" class="addContent__time" name="openTime[mo][to]">
                <input type="checkbox" id="round-the-clock-mo" name="openTime[mo][round]"/>
                <label for="round-the-clock-mo"><span></span>Круглосуточно</label>
                <input type="hidden" value="mo" name="openTime[mo][weekDay]">
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-tu" name="openTime[tu][day]" />
                    <label for="checkbox-tu"><span></span>Вт</label>
                </div>
                <input id="datetimepicker_from-tu" type="text" class="addContent__time" name="openTime[tu][from]"> -
                <input id="datetimepicker_to-tu" type="text" class="addContent__time" name="openTime[tu][to]">
                <input type="checkbox" id="round-the-clock-tu" name="openTime[tu][round]"/>
                <label for="round-the-clock-tu"><span></span>Круглосуточно</label>
                <input type="hidden" value="tu" name="openTime[tu][weekDay]">
            </div>

            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-we" name="openTime[we][day]" />
                    <label for="checkbox-we"><span></span>Ср</label>
                </div>
                <input id="datetimepicker_from-we" type="text" class="addContent__time" name="openTime[we][from]"> -
                <input id="datetimepicker_to-we" type="text" class="addContent__time" name="openTime[we][to]">
                <input type="checkbox" id="round-the-clock-we" name="openTime[we][round]"/>
                <label for="round-the-clock-we"><span></span>Круглосуточно</label>
                <input type="hidden" value="we" name="openTime[we][weekDay]">
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-th" name="openTime[th][day]" />
                    <label for="checkbox-th"><span></span>Чт</label>
                </div>
                <input id="datetimepicker_from-th" type="text" class="addContent__time" name="openTime[th][from]"> -
                <input id="datetimepicker_to-th" type="text" class="addContent__time" name="openTime[th][to]">
                <input type="checkbox" id="round-the-clock-th" name="openTime[th][round]"/>
                <label for="round-the-clock-th"><span></span>Круглосуточно</label>
                <input type="hidden" value="th" name="openTime[th][weekDay]">
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-fr" name="openTime[fr][day]" />
                    <label for="checkbox-fr"><span></span>Пт</label>
                </div>
                <input id="datetimepicker_from-fr" type="text" class="addContent__time" name="openTime[fr][from]"> -
                <input id="datetimepicker_to-fr" type="text" class="addContent__time" name="openTime[fr][to]">
                <input type="checkbox" id="round-the-clock-fr" name="openTime[fr][round]"/>
                <label for="round-the-clock-fr"><span></span>Круглосуточно</label>
                <input type="hidden" value="fr" name="openTime[fr][weekDay]">
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-sa" name="openTime[sa][day]" />
                    <label for="checkbox-sa"><span></span>Сб</label>
                </div>
                <input id="datetimepicker_from-sa" type="text" class="addContent__time" name="openTime[sa][from]"> -
                <input id="datetimepicker_to-sa" type="text" class="addContent__time" name="openTime[sa][to]">
                <input type="checkbox" id="round-the-clock-sa" name="openTime[sa][round]"/>
                <label for="round-the-clock-sa"><span></span>Круглосуточно</label>
                <input type="hidden" value="sa" name="openTime[sa][weekDay]">
            </div>

            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-su" name="openTime[su][day]" />
                    <label for="checkbox-su"><span></span>Вс</label>
                </div>
                <input id="datetimepicker_from-su" type="text" class="addContent__time" name="openTime[su][from]"> -
                <input id="datetimepicker_to-su" type="text" class="addContent__time" name="openTime[su][to]">
                <input type="checkbox" id="round-the-clock-su" name="openTime[su][round]"/>
                <label for="round-the-clock-su"><span></span>Круглосуточно</label>
                <input type="hidden" value="su" name="openTime[su][weekDay]">
            </div>
            <div class="singleContent__desc--contacts">
                <h3>Контакты</h3>
                <div class="singleContent__desc--line">
                    <span></span>
                    <label for="website">Web-сайт</label>
                    <input type="text" class="addContent__cont service_website" name="website">
                </div>
                <div class="singleContent__desc--line">
                    <label for="phonenumber">Телефон</label>
                    <input type="text" class="addContent__cont service_phone" name="phoneNumber[]" required>
                </div>
                <div class="singleContent__desc--line">
                    <label for="phonenumber_last"></label>
                    <input type="text" class="addContent__cont service_phone" name="phoneNumber[]"> <span id="firstPhone"></span>
                    <a href="#nowhere" id="addContentPhone" class="addContent__cont-add">+</a>
                </div>
                <div class="singleContent__desc--line">
                    <label for="mailadress">Почта</label>
                    <input type="text" class="addContent__cont" name="mailadress" required>

                </div>
            </div>
           <!-- <div class="singleContent__desc--carbrands">
                <?/*= SelectMultiplayAuto::widget(); */?>
            </div>-->
            <?= GetAllGroupById::widget(['groupId' => $_GET['service_type']]) ?>
            <?= ComfortZone::widget()?>

            <?php
            //Debug::prn($service);
                if($service->view_widget_auto_type == 1){
                    echo AutoType::widget(['viewBrandAuto' => ($service->view_mark_auto == 1) ? '1' : '0']);
                }
            ?>


            <!--<div class="addContent--save">
                <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
            </div>-->
            <div class="addContent--save">
                <input type="submit" value="Сохранить" class="btn btn-save" id="saveInfo">

        </div>
        </div>
        <span id="addressCount" count="0" active-id=""></span>
    </form>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавьте адрес</h4>
            </div>
            <div class="modal-body" style="float: left; width: 100%; height: 200px">
                <?= SelectAddress::widget() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button id="addAddressTo" data-dismiss="modal" type="button" class="btn btn-primary">Добавить</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->