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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
