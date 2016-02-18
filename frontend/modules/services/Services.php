<?php

namespace frontend\modules\services;

use yii\helpers\Url;

class Services extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\services\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
