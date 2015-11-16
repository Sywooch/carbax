<?php

namespace frontend\modules\flea_market;

use yii\helpers\Url;

class Flea_market extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\flea_market\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
