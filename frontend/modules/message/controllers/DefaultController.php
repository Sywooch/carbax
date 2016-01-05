<?php

namespace frontend\modules\message\controllers;

use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\Msg;
use common\models\db\Msg2;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send' => ['post'],
                ],
            ],
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

    public function beforeAction($action)
    {
        if ($action->id == 'send') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $inMsg = Msg::find()
            ->leftJoin('user','`user`.`id`=`msg`.`from`')
            ->where(['to'=>Yii::$app->user->id])
            ->with('user')
            ->orderBy('dt_send DESC')
            ->all();

        //Debug::prn($inMsg);
        $outMsg = Msg2::find()
            ->leftJoin('user','`user`.`id`=`msg`.`to`')
            ->where(['from'=>Yii::$app->user->id])
            ->with('user')
            ->orderBy('dt_send DESC')
            ->all();



       // Debug::prn($outMsg);
        return $this->render('index',
            [
                'inmsg' => $inMsg,
                'outmsg' => $outMsg,
            ]);
    }

    public function actionView(){
        $msg = Msg::find()->where(['id'=>$_GET['id']])->one();
        $msg->readed = 1;
        $msg->save();
        return $this->render('view',['msg'=>$msg]);
    }

    public function actionSend_message(){
        return $this->render('send_message');
    }

    public function actionSend(){
        if(isset($_POST['to_type'])){
            $msg_id = SendingMessages::send_message($_POST['message_to'],Yii::$app->user->id,$_POST['message_subject'],$_POST['content'],'0','request',$_POST['type_id']);
        }else{
            $msg_id = SendingMessages::send_message($_POST['message_to'],Yii::$app->user->id,$_POST['message_subject'],$_POST['content']);
        }

        if(isset($msg_id)){
            Yii::$app->session->setFlash('success','Сообщение отправлено');
            $inMsg = Msg::find()->where(['to'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
            $outMsg = Msg::find()->where(['from'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
            return $this->render('index',
                [
                    'inmsg' => $inMsg,
                    'outmsg' => $outMsg,
                ]);
        }
        else{
            Yii::$app->session->setFlash('error','Сообщение не отправлено');
            $inMsg = Msg::find()->where(['to'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
            $outMsg = Msg::find()->where(['from'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
            return $this->render('index',
                [
                    'inmsg' => $inMsg,
                    'outmsg' => $outMsg,
                ]);
        }

    }

    public function actionDel(){
        Msg::deleteAll(['id'=>$_GET['id']]);
        Yii::$app->session->setFlash('success','Сообщение удалено');
        $inMsg = Msg::find()->where(['to'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
        $outMsg = Msg::find()->where(['from'=>Yii::$app->user->id])->orderBy('dt_send DESC')->all();
        return $this->render('index',
            [
                'inmsg' => $inMsg,
                'outmsg' => $outMsg,
            ]);
    }
}
