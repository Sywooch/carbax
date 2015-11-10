<?php

namespace backend\modules\auto_type\controllers;

use common\models\db\AutoType;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $autoType = AutoType::find()->all();
        return $this->render('index',['auto'=>$autoType]);
    }
}
