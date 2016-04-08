<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 07.04.2016
 * Time: 10:28
 */

namespace frontend\modules\offers\widgets;


use common\classes\Address;
use common\classes\Debug;
use common\models\db\Offers;
use yii\base\Widget;

class SimilarOffers extends Widget
{
    public $service_type_id;

    public function run(){
        $address = Address::get_geo_info();

        $servId = explode(',',substr($this->service_type_id, 0 , -1));

        $offers = Offers::find()
            ->leftJoin('`offers_images`','`offers_images`.`offers_id` = `offers`.`id`')
            ->where(['LIKE', 'region_id', $address['region_id']])
            ->andWhere(['OR LIKE', 'service_type_id', $servId])
            ->andWhere(['status' => 1])
            ->orderBy('dt_add DESC')
            ->limit(9)
            ->with('offers_images')
            ->all();
        //Debug::prn($offers->createCommand()->rawSql);
        return $this->render('similar_offers', ['offers' => $offers]);

    }
}