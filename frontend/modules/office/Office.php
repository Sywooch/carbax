<?php

namespace frontend\modules\office;

use yii\helpers\Url;

class Office extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\office\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
