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
            $model->dt_add = time();
            $model->read_complaint = 0;
            $model->from_user = Yii::$app->user->id;
            $model->save();
            Yii::$app->session->setFlash('success','Жалоба отправленна');
            $complaint = Complaint::find()->where(['from_user'=>Yii::$app->user->id])->all();
            return $this->render('complaint', ['complaint' => $complaint]);
        }
        else {
            return $this->render('add', ['model' => $model]);
        }
    }

    public function actionDel(){
        $model = Complaint::deleteAll(['id' => $_GET['id']]);
        Yii::$app->session->setFlash('success','Жалоба удалена');
        $complaint = Complaint::find()->where(['from_user'=>Yii::$app->user->id])->all();
        return $this->render('complaint', ['complaint' => $complaint]);
    }

    public function actionView(){
        $complaint = Complaint::find()->where(['id' => $_GET['id']])->one();
        return $this->render('view', ['complaint' => $complaint]);
    }

    public function actionComplaint(){
        $complaint = Complaint::find()->where(['from_user'=>Yii::$app->user->id])->all();
        return $this->render('complaint', ['complaint' => $complaint]);
    }
}
