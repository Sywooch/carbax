<?php

namespace frontend\modules\profile\controllers;

use common\classes\Debug;
use common\models\User;
use Yii;
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

    public function actionView($id = null){
        $userId = ($id == null) ? Yii::$app->user->id : $id;

        $user = User::find()->where(['id' => $userId])->one();

        return $this->render('view', ['user' => $user]);
    }
}
