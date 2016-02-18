<?php
use common\classes\Debug;
use common\models\db\AdditionalFields;
?>

<?php
//Debug::prn($auto);

    if(isset($auto)):
?>
    <span>Марка:</span><?= $auto->brand_name; ?>
    <span>Модель:</span><?= $auto->model_name; ?>
    <span>Тип:</span><?= $auto->type_name; ?>
<?php
    endif;
?>

<?php
foreach ($fieldsFormArr as $ff) :?>
    <span><?= $ff->name; ?>:</span><?= $post[$ff->key]?>
<?php
endforeach;
?>

<h3>Дополнительно</h3>
<?php foreach($selectFields as $fields):?>
    <span><?= AdditionalFields::findOne($fields)->name;?></span>
<?php endforeach; ?>


