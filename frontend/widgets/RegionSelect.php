<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 15:04
 */

namespace frontend\widgets;


use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use Yii;
use yii\base\Widget;

class RegionSelect extends Widget
{

    public function run(){
        //$ip = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
        $ip = Yii::$app->ipgeobase->getLocation('5.153.133.222');
        $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
        $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
        return $this->render('region_select', ['ip'=>$ip, 'regionId' => $regionId, 'cityId' => $cityId]);
    }

}