<?php

namespace frontend\modules\message\controllers;

use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\Msg;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{
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

    public $layout = 'page';

    public function actionIndex()
    {
        $inMsg = Msg::find()->where(['to'=>Yii::$app->user->id])->all();
        $outMsg = Msg::find()->where(['from'=>Yii::$app->user->id])->all();
        return $this->render('index',
            [
                'inmsg' => $inMsg,
                'outmsg' => $outMsg,
            ]);
    }

    public function actionView(){
        // Debug::prn($_GET['id']);
        $msg = Msg::find()->where(['id'=>$_GET['id']])->one();
        $msg->readed = 1;
        $msg->save();
        return $this->render('view',['msg'=>$msg]);
    }

    public function actionSend_message(){
        return $this->render('send_message');
    }
}
