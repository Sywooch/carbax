<?
use yii\helpers\Html;
?>
    <h3>Выберите марки мото транспорта с которыми вы работаете</h3>
<?= Html::dropDownList('brandsMoto',$selMark,$mark,['id'=>'markType','class'=>'form-control','multiple'=>'multiple','size'=>'5']); ?>
<span class="mult_info">Для выбора нескольких, при клике, нажмите клавиш CTRL на клавиатуре</span>
