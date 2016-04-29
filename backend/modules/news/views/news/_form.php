<?php

use backend\modules\category_news\widgets\CategoryTreeSelect;
use mihaildev\elfinder\InputFile;
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

<div class="imgUpload">
    <div class="media__upload_img"><img src="<?=$model->img_url;?>" width="100px"/></div>

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
        'value' => $model->img_url,
        'buttonName' => 'Выбрать изображение'
    ]);
    ?>
</div>
    <?= CategoryTreeSelect::widget(['selectId' => $model->cat_id,'selectName'=>'News[cat_id]'])?>
    <?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
            'path' => 'frontend/web/media/upload',
        ]),
    ]);?>

    <?/*= $form->field($model, 'short_description')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'short_description')->widget(CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
            'path' => 'frontend/web/media/upload',
        ]),
    ]);?>
    <!-- <?= $form->field($model, 'dt_add')->textInput() ?> -->

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
