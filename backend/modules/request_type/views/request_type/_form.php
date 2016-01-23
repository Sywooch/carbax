<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_type\models\RequestType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <!--<button class="btn btn-primary" data-toggle="modal" data-target=".media_upload">Выберите изображение</button>
    <div class="media__upload_img"><img src="<?/*=$model->icon;*/?>" width="100px"/><input id="mediaUploadInputFile" name="mediaUploadInputFile" type="hidden" value="<?/*=$model->icon;*/?>"/></div>-->

    <div class="imgUpload">
        <div class="media__upload_img"><img src="<?=$model->icon;?>" width="100px"/></div>

        <?php
        echo InputFile::widget([
            'language'   => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'name'       => 'mediaUploadInputFile',
            'id' => 'itemImg',

            'template'      => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-primary'],
            'value' => $model->icon,
            'buttonName' => 'Выбрать изображение'
        ]);
        ?>
    </div>


    <?php
        if(isset($selected))
        {
            $sel = $selected;
        }
        else
        {
            $sel = null;
        }

    ?>

    <?= Html::label('Группа услуг', 'group'); ?>
    <?= Html::dropDownList('group', $sel, $group, ['id'=>'group', 'class'=>'form-control', 'multiple'=>'multiple']); ?>

    <?php
    //\common\classes\Debug::prn($selForm);
        if(isset($selForm)){
            $selForm = $selForm;
        }
        else{
            $selForm = null;
        }

    ?>

    <?= Html::label('Выберите формы','formType');?>
    <?= Html::dropDownList('formType',$selForm,$formType,['id'=>'formType','class'=>'form-control','multiple'=>'multiple']); ?>


    <?= $form->field($model,'view_widget_auto')->checkbox(['label'=>'Отображать выбор марки авто']);?>
    <?= $form->field($model,'view_category_auto')->checkbox(['label'=>'Отображать выбор категорий авто']);?>


   <!-- --><?/*= Html::checkbox('view_vidjet_auto',$ch,['label'=>'Отображать выбор марки авто']); */?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
