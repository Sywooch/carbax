<?php
namespace frontend\modules\mainpage\widgets;

use common\classes\Address;
use common\classes\Custom_function;
use common\classes\Debug;
use common\models\db\ComfortZone;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\ServiceType;
use common\models\db\User;
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
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city_id',
                'value' => $cityId,
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'region_id',
                'value' => $regionId,
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lat',
                'value' => $ip['lat'],
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lng',
                'value' => $ip['lng'],
                'httpOnly' => false,
            ]));
        }
        else{
            //Debug::prn($cookies->get('city'));
            $cookies = Yii::$app->request->cookies;
            if ($cookies->get('city') !== null) {
                $ip['lat'] = $cookies->get('lat');
                $ip['lng'] = $cookies->get('lng');
                $regionId = $cookies->get('region_id');
                $cityId = $cookies->get('city_id');
            }
            else {
                $user = User::findOne(Yii::$app->user->id);
                if($user->region_id != 0){
                    $cookies = Yii::$app->response->cookies;
                    $region = GeobaseCity::find()->where(['id'=>$user->city_id, 'region_id'=>$user->region_id])->one();
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'city',
                        'value' => $region->name,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'city_id',
                        'value' => $region->id,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'region_id',
                        'value' => $region->region_id,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'lat',
                        'value' => $region->latitude,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'lng',
                        'value' => $region->longitude,
                    ]));
                }
                else {
                    $ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
                    $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
                    $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
                }
            }

        }

        //Debug::prn($cityId);
        $serviceTypes = ServiceType::find()->all();
        $comfortZone = ComfortZone::find()->all();
        return $this->render('main_map', [
            'serviceType' => $serviceTypes,
            'lat'  => $ip['lat'],
            'lng' => $ip['lng'],
            'region_id' => $regionId,
            'city_id' => $cityId,
            'comfortZone' => $comfortZone,
        ]);
    }
}