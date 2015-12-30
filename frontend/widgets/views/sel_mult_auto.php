<?
use yii\helpers\Html;
?>
    <h3>Выберите марки легковых машин с которыми вы работаете</h3>
<?= Html::dropDownList('brands',$selMark,$mark,['id'=>'markType','class'=>'form-control','multiple'=>'multiple','size'=>'5']); ?>
    <span class="mult_info">Для выбора нескольких, при клике, нажмите клавиш CTRL на клавиатуре</span>
