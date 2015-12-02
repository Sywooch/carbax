<?php

namespace frontend\modules\profile;

use yii\helpers\Url;

class Profile extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\profile\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
