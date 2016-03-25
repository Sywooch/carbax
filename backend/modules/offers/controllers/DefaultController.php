<?php

namespace backend\modules\offers\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $time = date('H:i:s');
        return $this->render('index', ['time' => $time]);

    }
}
