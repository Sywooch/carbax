<?
use yii\helpers\Html;
?>
    <h3>Выберите марки машин с которыми вы работаете</h3>
<?= Html::dropDownList('brandsCargo',$selMark,$mark,['id'=>'markType','class'=>'form-control','multiple'=>'multiple']); ?>