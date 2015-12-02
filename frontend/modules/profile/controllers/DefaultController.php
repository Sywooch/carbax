<?php

namespace frontend\modules\profile\controllers;

use common\classes\Debug;
use common\models\db\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add_to_sql' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'add_to_sql') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public $layout = 'page';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit_contacts(){
        return $this->render('edit_contacts',
            [
                'user' => User::find()->where(['id'=>Yii::$app->user->id])->one(),
            ]);
    }

    public function actionAdd_to_sql(){
        $user = User::findOne(Yii::$app->user->id);
        if(!empty($_FILES['file']['name'])){
            if(!file_exists('media/users/'.Yii::$app->user->id)){
                mkdir('media/users/'.Yii::$app->user->id.'/');
            }
            if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
                mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
            }
            $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';

            move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
            $user->avatar = $dir.$_FILES['file']['name'];
        }
        $user->name = $_POST['name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->telephon = $_POST['telephon'];
        $user->skype = $_POST['skype'];
        $user->icq = $_POST['icq'];
        $user->link_vk = $_POST['link_vk'];
        if(!empty($_POST['passwordUserEdit'])){
            $user->setPassword($_POST['passwordUserEdit']);
        }
        $user->save();
        Yii::$app->session->setFlash('success','Информация успешно обновлена');
        return $this->render('edit_contacts',
            [
                'user' => User::find()->where(['id'=>Yii::$app->user->id])->one(),
            ]);
    }
}
