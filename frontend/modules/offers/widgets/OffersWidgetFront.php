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
       // $region = $address['region_id'];
        $offers = Offers::find()
            ->leftJoin('`offers_images`','`offers_images`.`offers_id` = `offers`.`id`')
            ->where(['LIKE', 'region_id', $address['region_id'].','])
            ->andWhere(['status'=>1])
            ->orderBy('dt_add DESC')
            ->limit(9)
            ->with('offers_images')
            ->all();
        //Debug::prn($offers[0]['offers_images']->images);
        return $this->render('offers',
            [
                'offers' => $offers,
            ]);


    }

}