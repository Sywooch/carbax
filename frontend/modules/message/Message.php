<?php

namespace frontend\modules\message;

use yii\helpers\Url;

class Message extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\message\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
