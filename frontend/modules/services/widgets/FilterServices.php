<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 22.04.2016
 * Time: 13:16
 */

namespace frontend\modules\services\widgets;


use app\models\GeobaseRegion;
use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\ServiceType;
use yii\base\Widget;

class FilterServices extends Widget
{
    public $address;
    public $count;
    public function run(){
        $region = GeobaseRegion::find()->orderBy('name')->all();
        $city = GeobaseCity::find()->where(['region_id' => $this->address['region_id'] ])->orderBy('name')->all();
        $typeServ = ServiceType::find()->all();
        return $this->render('filter',
            [
                'address' => $this->address,
                'region' => $region,
                'city' => $city,
                'typeServ'=> $typeServ,
                'count' => $this->count,
            ]
            );
    }
}