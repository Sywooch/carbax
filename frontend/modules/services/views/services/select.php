<?php

$this->title = "Выберите вид бизнеса";

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;

use frontend\modules\services\widgets\ServiceTypeList;

echo ServiceTypeList::widget(['type'=>1]);