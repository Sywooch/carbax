<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 12.10.2015
 * Time: 16:09
 */

namespace frontend\modules\office\controllers;


use yii\web\Controller;

class OfficeController extends Controller
{
    public $layout = 'page';

    public function actionIndex()
    {
        return $this->render('index');
    }
}