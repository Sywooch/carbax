<?php

namespace frontend\modules\request;

use yii\helpers\Url;

class Request extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\request\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->layoutPath = Url::to('@frontend/views/layouts');
    }
}
