<?php
namespace frontend\modules\mainpage\widgets;



use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\ServiceType;
use Yii;
use yii\base\Widget;

class MainPageMap extends Widget
{
    public function run(){
        $ip = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
        $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
        $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
        //Debug::prn($cityId);
        $serviceTypes = ServiceType::find()->all();
        return $this->render('main_map', [
            'serviceType' => $serviceTypes,
            'lat'  => $ip['lat'],
            'lng' => $ip['lng'],
            'region_id' => $regionId,
            'city_id' => $cityId,
        ]);
    }
}