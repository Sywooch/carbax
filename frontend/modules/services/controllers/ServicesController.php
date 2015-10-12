<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 02.10.2015
 * Time: 7:57
 */

namespace frontend\modules\services\controllers;


use common\classes\Debug;
use common\models\db\ServiceType;
use yii\web\Controller;

class ServicesController extends Controller
{
    public $layout = 'page';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){

    }

    public function actionSelect_service(){
        $serviceTypes = ServiceType::find()->all();

        return $this->render('select', ['service' => $serviceTypes]);
    }

    public function actionMy_services(){
        $serviceTypeId = $_GET['service_id'];
        Debug::prn($serviceTypeId);
    }
}