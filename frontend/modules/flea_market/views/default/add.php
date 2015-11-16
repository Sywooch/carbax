<?php

use common\classes\Debug;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = "Добавить товар";
?>

<div class="addContent">

    <form id="addForm" action="add_to_sql" method="post">
        <input type="text" name="title" class="addContent__title" placeholder="Название товара">
        <?php
        //Debug::prn($tofMan);
        ?>
        <?= Html::dropDownList('manufactures',0, ArrayHelper::map($tofMan, 'mfa_id', 'mfa_brand'), ['class'=>'addContent__adress', 'id'=>'manSelect'])?>
        <span id="modelBox"></span>
        <span id="typesBox"></span>
    </form>
</div>