<?php

namespace frontend\widgets;

use yii\base\Widget;

class TogglePrivateOfficeLeft extends Widget
{
    public $print;

    public function run(){
        if(!$this->print){
            return $this->render('tpol');
        }
    }
}