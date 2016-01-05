<?php

namespace frontend\modules\mainpage\controllers;

use common\classes\Debug;
use common\models\db\Services;
use Yii;
use yii\helpers\Url;

class MainpageController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet_address(){
        $allTypeids = explode(',', $_POST['serviceTypeIds']);
        $services = Services::find()
            ->joinWith('address')
            ->where(['service_type_id' => $allTypeids, 'address.region_id' => $_POST['regionId']])
            ->all();
        //Debug::prn($services);
        $address = [];
        foreach($services as $s){
            if(!empty($s->address)){
                foreach($s->address as $a){
                    $ad = $a['address'];
                    echo "<span class='main_map_address' address='$ad'></span>";
                }
            }
        }

    }

}
