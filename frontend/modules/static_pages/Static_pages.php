<?php

namespace frontend\modules\static_pages;

use yii\helpers\Url;

class Static_pages extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\static_pages\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
