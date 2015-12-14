<?php
$this->registerCssFile('/css/bootstrap.min.css');
use backend\modules\request_add_form\models\RequestAddForm;
use common\models\db\AddFieldsGroup;
use common\models\db\RequestTypeGroup;
use frontend\modules\services\widgets\GetAllGroupById;
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
        echo SelectAddress::widget(['address' => false]);
        ?>

        <span id="selectAuto">
            <?php
            if ($requestType->view_widget_auto == 1) {
                echo SelectAuto::widget(['view' => $requestType->view_category_auto]);
                echo "<div style='width: 100%; float: left; margin-bottom: 20px'><a href='#' id='selectAutoFromGarage'>Выбрать авто из гаража</a></div>";
            }
            ?>
        </span>
        <div class="singleContent__desc">
            <?php
            foreach ($addForm as $f) {
                $k = RequestAddForm::find()->where(['id' => $f->add_form_id])->one();
                //\common\classes\Debug::prn($k->form_type);

                if ($k->form_type == 0) {
                    echo Html::label($k->name, null, ['style' => 'width:100%']);
                    echo "<br />";
                    echo Html::textInput($k->key, null, ['class' => 'addContent__adress']);
                }
                if ($k->form_type == 1) {
                    echo Html::label($k->name, null, ['style' => 'width:100%']);
                    echo "<br />";
                    echo Html::textarea($k->key, '', ['class' => 'addContent__description']);
                }
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
