<?php

namespace frontend\modules\mainpage\controllers;

class MainpageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
