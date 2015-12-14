<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_type\models\RequestType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <button class="btn btn-primary" data-toggle="modal" data-target=".media_upload">Выберите изображение</button>
    <div class="media__upload_img"><img src="<?=$model->icon;?>" width="100px"/><input id="mediaUploadInputFile" name="mediaUploadInputFile" type="hidden" value="<?=$model->icon;?>"/></div>

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
