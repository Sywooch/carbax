<?php

namespace frontend\modules\complaint;

use yii\helpers\Url;

class Complaint extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\complaint\controllers';

    public function init()
    {
        parent::init();
        $this->layoutPath = Url::to('@frontend/views/layouts');
        // custom initialization code goes here
    }
}
