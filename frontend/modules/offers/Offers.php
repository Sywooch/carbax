<?php

namespace frontend\modules\offers;

use yii\helpers\Url;

class Offers extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\offers\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
