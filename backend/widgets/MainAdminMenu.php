<?php

namespace backend\widgets;

use yii\base\Widget;

class MainAdminMenu extends Widget
{

    public function run(){
        return $this->render('main_menu');
    }

}