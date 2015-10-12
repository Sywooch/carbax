<?php

namespace frontend\widgets;

use yii\base\Widget;

class TogglePrivateOfficeLeft extends Widget
{
    public function run(){
        return $this->render('tpol');
    }
}