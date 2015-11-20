<?php

use backend\modules\category_news\widgets\CategoryTreeSelect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\db\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>
    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'img_url')->textInput(['maxlength' => true]) */?>

    <button class="btn btn-primary" data-toggle="modal" data-target=".media_upload">Выберите изображение</button>
    <div class="media__upload_img"><img src="<?=$model->img_url;?>" width="100px"/><input id="mediaUploadInputFile" name="mediaUploadInputFile" type="hidden" value="<?=$model->img_url;?>"/></div>

    <?= CategoryTreeSelect::widget(['selectId' => $model->cat_id,'selectName'=>'News[cat_id]'])?>
    <?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);?>

    <?/*= $form->field($model, 'short_description')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'short_description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);?>
    <!-- <?= $form->field($model, 'dt_add')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
