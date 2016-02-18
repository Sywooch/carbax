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
<section class="main-container">
    <form id="addForm" action="send_request" method="post">

        <div></div>
        <div></div>

        <h3>Ваш регион и город:</h3>
        <?= RegionSelect::widget() ?>
        <span id="selectAuto">
            <?php
            if ($requestType->view_widget_auto == 1) {
                echo SelectAuto::widget(['view' => $requestType->view_category_auto,'select_from_garage'=>true]);
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
            <div class="requestDiametr">
                <?php
                    echo Html::label('Диаметр');
                    echo Html::dropDownList('diameter',$model->diameter,$diameter,['prompt'=>'-','class'=>'addContent__adress']);
                ?>
            </div>
            <div class="requestDiametr">
                <?php
                    echo Html::label('Сезонность');
                    echo Html::dropDownList('seasonality',$model->seasonality,['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'-','class'=>'addContent__adress requestSeasons']);
                ?>
            </div>
            <div class="requestDiametr">
                <?php
                    echo Html::label('Ширина профиля');
                    echo Html::dropDownList('section_width',$model->section_width,$section_width,['prompt'=>'-','class'=>'addContent__adress requestWidthProfil']);
                ?>
            </div>
            <div class="requestDiametr">
                <?php
                    echo Html::label('Высота профиля');
                    echo Html::dropDownList('section_height',$model->section_height,$section_height,['prompt'=>'-','class'=>'addContent__adress requestHeightProfile']);
                ?>
            </div>
        </div>
        <div class="requestAddFieldGroup">
            <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]);?>
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
        </div>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>
    </form>
</section>