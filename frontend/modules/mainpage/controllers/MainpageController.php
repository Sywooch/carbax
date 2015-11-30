<?php

namespace frontend\modules\mainpage\controllers;

use common\classes\Debug;
use common\models\db\Services;
use Yii;
use yii\helpers\Url;

class MainpageController extends \yii\web\Controller
{
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
            ->where(['service_type_id' => $allTypeids])
            ->all();
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
