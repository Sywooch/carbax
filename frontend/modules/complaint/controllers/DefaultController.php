<?php

namespace frontend\modules\complaint\controllers;

use common\classes\Debug;
use common\models\db\Complaint;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{

    public $layout = 'page';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){
        $model = new Complaint();
        if ($model->load(Yii::$app->request->post())) {
            Debug::prn($model);
        }
        else {
            return $this->render('add', ['model' => $model]);
        }
    }
}
