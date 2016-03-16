<?php

namespace backend\modules\reviews\controllers;

use common\models\db\Reviews;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $query = Reviews::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $reviews = $query
            ->leftJoin('`user`','`user`.`id` = `reviews`.`user_id`')
            ->orderBy('dt_add DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('user')
            ->all();

        return $this->render('index', [
            'reviews' => $reviews,
            'pagination' => $pagination,
        ]);
    }

    public function actionSet_status(){
        Reviews::updateAll(['publ' => $_POST['status']],['id' => $_POST['id']]);
    }
}
