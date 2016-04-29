<?php

use backend\modules\category_news\widgets\CategoryTreeSelect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\modules\category_news\models\Category_news */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'parent_id')->textInput() */?>
 <?php /*\common\classes\Debug::prn($model->parent_id)*/?>

    <?= CategoryTreeSelect::widget(['selectId'=>$model->parent_id,'selectName'=>'Category_news[parent_id]']);?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'descr')->textarea(['rows' => 6]) */?>

    <?php echo $form->field($model, 'descr')->widget(CKEditor::className(),[
    'editorOptions' => [
    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    'inline' => false, //по умолчанию false
    ],
    ]);?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
