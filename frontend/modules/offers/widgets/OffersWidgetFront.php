<?php

namespace frontend\modules\offers\widgets;

use common\classes\Address;
use common\classes\Debug;
use common\models\db\News;
use common\models\db\Offers;
use himiklab\ipgeobase\IpGeoBase;
use Yii;
use yii\base\Widget;
use yii\db\Query;

class OffersWidgetFront extends Widget
{

    public function run(){
        $address = Address::get_geo_info();

        $offers = Offers::find()->where(['region_id'=>$address['region_id']])->orderBy('dt_add DESC')->limit(9)->all();
        //Debug::prn($offers);
        return $this->render('offers',
            [
                'offers' => $offers,
            ]);


    }

}