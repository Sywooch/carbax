<?php

namespace frontend\modules\profile\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit_contacts(){
        return $this->render('edit_contacts');
    }
}
