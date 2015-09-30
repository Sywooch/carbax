<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\ServiceType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-type-form">

    <?php $form = ActiveForm::begin(); ?>

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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
