<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\ServiceType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-type-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php

    if(isset($selected)){
        $sel = $selected;
    }
    else {
        $sel = null;
    }

    ?>

    <?= Html::label('Группа услуг', 'group'); ?>
    <?= Html::dropDownList('group', $sel, $group, ['id'=>'group', 'class'=>'form-control', 'multiple'=>'multiple']); ?>
    <br>
   <!-- <?/*= Html::label('Ярлык', 'icon'); */?>
    --><?/*= Html::fileInput('icon',null,['id'=>'icon','class'=>'form-control']) */?>
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


   <!-- --><?/*= $form->field($icon, 'icon_s')->fileInput()->label('Ярлык') */?>
    <br>
    <?= $form->field($model,'view_widget_auto_type')->checkbox(['label'=>'Отображать выбор типа авто']);?>
    <?= $form->field($model,'view_mark_auto')->checkbox(['label'=>'Отображать выбор марок авто']);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
