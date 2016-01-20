<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 20.01.2016
 * Time: 11:58
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<h2>Дополнительные параметры</h2>
<?php if($drive): ?>
    <?= Html::dropDownList('drive', 0, ArrayHelper::map($drive, 'id', 'name'), ['prompt'=>'Тип привода', 'class'=>'addContent__adress']) ?>
<?php endif; ?>

<?php if($body): ?>
    <?= Html::dropDownList('body', 0, ArrayHelper::map($body, 'id', 'name'), ['prompt'=>'Тип кузова', 'class'=>'addContent__adress']) ?>
<?php endif; ?>

<?php if($typeMotor): ?>
    <?= Html::dropDownList('typeMotor', 0, ArrayHelper::map($typeMotor, 'id', 'name'), ['prompt'=>'Тип двигателя', 'class'=>'addContent__adress']) ?>
<?php endif; ?>

<?php if($trans): ?>
    <?= Html::dropDownList('trans', 0, ArrayHelper::map($trans, 'id', 'name'), ['prompt'=>'Коробка передач', 'class'=>'addContent__adress']) ?>
<?php endif; ?>

<?= Html::textInput('run', '', ['class' => 'addContent__adress', 'placeholder' => 'Пробег, тыс.км']) ?>
<?= Html::textInput('size_motor', '', ['class' => 'addContent__adress', 'placeholder' => 'Объем двигателя, куб.м']) ?>
<?= Html::textInput('vin-code', '', ['class' => 'addContent__adress', 'placeholder' => 'VIN код']) ?>
