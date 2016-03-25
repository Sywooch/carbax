<?php
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 1000);
});
JS;
$this->registerJs($script);
?>

<?php Pjax::begin();?>
<?= Html::a("Обновить", ['/offers/default/index'], ['class' => 'btn btn-lg btn-primary','id' => 'refreshButton']);?>
<h1>Сейчас: <?= $time ?></h1>
<? Pjax::end();
?>