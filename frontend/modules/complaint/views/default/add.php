<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Написать жалобу";
//$this->params['breadcrumbs'][] = ['label' => 'Входящие', 'url' => ['/message']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
if(isset($_GET['type'])){
    if($_GET['type'] == 'market'){
        $link = Url::to(['/flea_market/default/view', 'id' => $_GET['id']], true);
    }
}
else {
    $link = '';
}
?>

<section class="main-container">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'subject')->textInput()->label('Тема:') ?>
    <?= $form->field($model, 'to_object')->textInput(['value'=>$link])->label('Ссылка на материал:') ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 10])->label('Жалоба:') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</section>