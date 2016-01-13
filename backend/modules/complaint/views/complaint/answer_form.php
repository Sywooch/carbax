<?php
use common\models\db\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Ответ на жалобу";
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
    <?= $form->field($msg, 'subject')->textInput(['value'=>'Ответ на жалобу: ' . $complaint->subject])->label('Тема:') ?>
    <?= $form->field($msg, 'to')->textInput(['value'=> User::getLogin($complaint->from_user)])->label('Получатель:') ?>
    <?= $form->field($msg, 'content')->textarea(['rows' => 10])->label('Ответ:') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</section>