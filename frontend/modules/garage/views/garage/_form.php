<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('/css/bootstrap_cast.min.css');
$this->registerJsFile();
?>
    <div class="garage-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

        <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'models')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dvs')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model,'type_car')->radioList(['1'=>'Легковая','2'=>'Грузовая','3'=>'Мото']);?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

