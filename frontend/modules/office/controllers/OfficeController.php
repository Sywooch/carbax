<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 12.10.2015
 * Time: 16:09
 */

namespace frontend\modules\office\controllers;


use common\classes\Debug;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class OfficeController extends Controller
{
    public $layout = 'page';

    public function behaviors() {
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

    public function actionSet_akk(){
        if($_GET['type'] == 1){
            Yii::$app->authManager->assign(Yii::$app->authManager->getRole('business'),Yii::$app->user->id);
        }else{
            Yii::$app->authManager->assign(Yii::$app->authManager->getRole('user'),Yii::$app->user->id);

        }

        return $this->redirect('/office');
    }
}