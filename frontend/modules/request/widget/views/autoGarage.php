<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php if(empty($auto)):?>
    <p class="parag_text"><span>у вас нет машин в гараже</span></p>
<?php else: ?>
    <?= Html::dropDownList(
        'autoGarage',
        'null',
        ArrayHelper::map($auto,'id','title'),
        ['prompt'=>'Выберите автомобиль','class'=>'addContent__adress selAutoGarage']
    );
    ?>
<?php endif ?>
