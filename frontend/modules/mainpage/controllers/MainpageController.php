<?php

namespace frontend\modules\mainpage\controllers;

use Yii;
use yii\helpers\Url;

class MainpageController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
