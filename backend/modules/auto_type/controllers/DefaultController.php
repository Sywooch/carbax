<?php

namespace backend\modules\auto_type\controllers;

use common\models\db\AutoType;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $autoType = AutoType::find()->all();
        return $this->render('index',['auto'=>$autoType]);
    }
}
