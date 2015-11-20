<?php

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
    <button class="btn btn-primary" data-toggle="modal" data-target=".media_upload">Выберите изображение</button>
    <div class="media__upload_img"><img src="<?=$model->icon;?>" width="100px"/><input id="mediaUploadInputFile" name="mediaUploadInputFile" type="hidden" value="<?=$model->icon;?>"/></div>
   <!-- --><?/*= $form->field($icon, 'icon_s')->fileInput()->label('Ярлык') */?>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
