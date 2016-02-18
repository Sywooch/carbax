<?php
use common\classes\Debug;
use yii\jui\AutoComplete;
echo "<br><br><br><br>";
//Debug::prn($city);
echo AutoComplete::widget([
    'clientOptions' => [
        'source' => $regions,
    ],
]);