<?php
namespace frontend\modules\mainpage\widgets;



use common\classes\Debug;
use common\models\db\ServiceType;
use Yii;
use yii\base\Widget;

class MainPageMap extends Widget
{
    public function run(){
        $ip = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
        $serviceTypes = ServiceType::find()->all();
        return $this->render('main_map', ['serviceType' => $serviceTypes, 'lat'  => $ip['lat'], 'lng' => $ip['lng']]);
    }
}