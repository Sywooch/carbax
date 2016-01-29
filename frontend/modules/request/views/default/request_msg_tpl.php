<?php
use common\models\db\AdditionalFields;
?>

<?php
    if(!empty($auto)):
?>

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


