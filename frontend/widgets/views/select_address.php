<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

echo Html::dropDownList('regions',0, ArrayHelper::map($regions, 'id', 'name'),[]);