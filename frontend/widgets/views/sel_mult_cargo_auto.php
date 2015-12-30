<?
use yii\helpers\Html;
?>
    <h3>Выберите марки грузовых машин с которыми вы работаете</h3>
<?= Html::dropDownList('brandsCargo',$selMark,$mark,['id'=>'markType','class'=>'form-control','multiple'=>'multiple']); ?>
<span class="mult_info">Для выбора нескольких, при клике, нажмите клавиш CTRL на клавиатуре</span>
