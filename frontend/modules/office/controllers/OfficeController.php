<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 12.10.2015
 * Time: 16:09
 */

namespace frontend\modules\office\controllers;


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
}