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
            $cookies = Yii::$app->response->cookies;
            $city = GeobaseCity::find()->where(['id'=>$_POST['city_id']])->one();
            $ip['lat'] = $city->latitude;
            $ip['lng'] = $city->longitude;
            $regionId = $city->region_id;
            $cityId = $_POST['city_id'];
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city',
                'value' => $city->name,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city_id',
                'value' => $cityId,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'region_id',
                'value' => $regionId,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lat',
                'value' => $ip['lat'],
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lng',
                'value' => $ip['lng'],
            ]));
        }
        else{
            $cookies = Yii::$app->request->cookies;
            //Debug::prn($cookies->get('city'));
            if ($cookies->get('city') !== null) {
                $ip['lat'] = $cookies->get('lat');
                $ip['lng'] = $cookies->get('lng');
                $regionId = $cookies->get('region_id');
                $cityId = $cookies->get('city_id');
            }
            else {
                $ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
                $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
                $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
            }

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