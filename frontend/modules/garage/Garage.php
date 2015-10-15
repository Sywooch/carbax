<?php

namespace frontend\modules\garage;

use yii\helpers\Url;

class Garage extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\garage\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
