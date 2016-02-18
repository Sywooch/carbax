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
        //$allTypeids = explode(',', 1);
        $allTypeids = explode(',', $_POST['serviceTypeIds']);
        $allComfortZoneId = explode(',', $_POST['comfortZoneId']);
//Debug::prn($allComfortZoneId);
        $services = Services::find()
            ->joinWith('address')
            ->joinWith('phone');
            if(!empty($allComfortZoneId[0])){
                $services->joinWith('service_comfort_zone');
            }

            $services->where(['address.region_id' => $_POST['regionId'],]);
            if(!empty($allTypeids)){
                $services->andFilterWhere(['service_type_id' => $allTypeids,]);
            }

            if(!empty($allComfortZoneId[0])){
                $services->andFilterWhere(['`service_comfort_zone`.`comfort_zone_id`' => $allComfortZoneId]);
            }


       // Debug::prn($services->createCommand()->rawSql);

            $result = $services->all();
       // Debug::prn($result);
        $address = [];
        foreach($result as $s){
            $phone = '';
            if(!empty($s->phone)){
                foreach($s->phone as $p){
                    $phone .= $p->number . " ";
                }
            }
            if(!empty($s->address)){
                foreach($s->address as $a){
                    //Debug::prn($s);
                    $ad = $a['address'];
                    echo "<span class='main_map_address' service_type_id='$s->service_type_id' phone='$phone' photo='$s->photo' service_id='$s->id' address='$ad' title='$s->name' email='$s->email'></span>";
                }
            }
        }

    }

}
