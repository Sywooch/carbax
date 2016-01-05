<?php
namespace frontend\modules\mainpage\widgets;



use common\classes\Custom_function;
use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\ServiceType;
use Yii;
use yii\base\Widget;

class MainPageMap extends Widget
{
    public function run(){
        if(isset($_POST['city_name'])){
            $city = GeobaseCity::find()->where(['id'=>$_POST['city_id']])->one();
            $ip['lat'] = $city->latitude;
            $ip['lng'] = $city->longitude;
            $regionId = $city->region_id;
            $cityId = $_POST['city_id'];
        }
        else{
            $ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
            $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
            $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
        }

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