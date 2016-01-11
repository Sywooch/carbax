<?php

namespace frontend\modules\favorites;

use yii\helpers\Url;

class Favorites extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\favorites\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
