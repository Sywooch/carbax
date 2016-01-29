<?php
$this->registerCssFile('/css/bootstrap.min.css');

use backend\modules\request_add_form\models\RequestAddForm;
use common\classes\Debug;
use common\models\db\RequestTypeGroup;
use frontend\modules\services\widgets\GetAllGroupById;
use frontend\widgets\CustomField;
use frontend\widgets\RegionSelect;
use frontend\widgets\RequestAddFieldGroup;
use frontend\widgets\SelectAddress;
use frontend\widgets\SelectAuto;
use yii\helpers\Html;

$this->title = "Добавить заявку";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
    <form id="addForm" action="send_request" method="post">
        <?php
/*        echo SelectAddress::widget(['address' => false]);

        */?>
        <?= RegionSelect::widget() ?>

        <span id="selectAuto">
            <?php
            if ($requestType->view_widget_auto == 1) {
                echo SelectAuto::widget(['view' => $requestType->view_category_auto,'select_from_garage'=>true]);
               // echo "<div style='width: 100%; float: left; margin-bottom: 20px'><a href='#' id='selectAutoFromGarage'>Выбрать авто из гаража</a></div>";
            }

            if($requestType->view_mark_auto == 1){
            echo Html::dropDownList(
                'typeAuto',
                0,
                ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=>'Мото транспорт'],
                ['prompt' => 'Выберите тип авто', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto', 'required' => 'required']
            );
            }
            ?>

        </span>
        <?/*= CustomField::widget([
            'name'=>'my',
            'template' => '<div class="labelBox">{label}</div><div class="inputBox">{input}</div>',
            'inputOption' => ['class'=>'myClass', 'id'=>'myId'],
            'labelName' => 'Поле',
            'value' => 'Привет',
            'labelOption' => ['for'=>'myId']
        ])*/?>
        <div class="singleContent__desc">
            <?php
            foreach ($addForm as $f) {
                $k = RequestAddForm::find()->where(['id' => $f->add_form_id])->one();
                //\common\classes\Debug::prn($k->form_type);
                //Debug::prn($k);
                echo CustomField::widget([
                    'name' => $k->key,
                    'template' => $k->template,
                    'inputOption' => ['class' => $k->class, 'id' => $k->input_id, 'placeholder' => $k->placeholder],
                    'labelOption' => ['for' => $k->input_id, 'style' => 'width:100%'],
                    'labelName' => $k->name,
                    'type' => ($k->form_type == 0) ? 'input' : 'textarea'
                ]);
                /*if ($k->form_type == 0) {
                    echo Html::label($k->name, null, ['style' => 'width:100%']);
                    echo "<br />";
                    echo Html::textInput($k->key, null, ['class' => 'addContent__adress']);
                }
                if ($k->form_type == 1) {
                    echo Html::label($k->name, null, ['style' => 'width:100%']);
                    echo "<br />";
                    echo Html::textarea($k->key, '', ['class' => 'addContent__description']);
                }*/
            }
            ?>
        </div>
            <?php
            echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]);
            /*foreach ($groupService as $gr) {
               // \common\classes\Debug::prn($gr->add_fields_group_id);
               // echo GetAllGroupById::widget(['groupId' => $gr->add_fields_group_id]);
                $groups = AddFieldsGroup::find()->where(['groupId'=>$this->groupId])->all();
            }*/

            echo Html::hiddenInput('request_type_id', $_GET['id']);
            ?>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>

    </form>
</section>
