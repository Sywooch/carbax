<?php

$this->title = "Выберите вид бизнеса";

use frontend\modules\services\widgets\ServiceTypeList;

echo ServiceTypeList::widget(['type'=>1]);