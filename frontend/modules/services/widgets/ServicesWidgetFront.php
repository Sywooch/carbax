<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 19.07.2016
 * Time: 12:01
 */

namespace frontend\modules\services\widgets;


use common\classes\Address;
use common\classes\Debug;
use common\models\db\Services;
use common\models\db\ServiceType;
use yii\base\Widget;

class ServicesWidgetFront extends Widget
{
    public function run(){
        $address = Address::get_geo_info();
        $servicesType = ServiceType::find()->all();
        $result = [];
        foreach ($servicesType as $item) {
            $result[$item->id]['infotype'] = $item;
            $result[$item->id]['countservices'] =
                Services::find()
                    ->leftJoin('address', '`address`.`service_id` = `services`.`id`' )
                    ->where(['`services`.`service_type_id`' => $item->id, '`address`.`region_id`' => $address['region_id']])
                    ->count();
        }
        //Debug::prn($result);
        return $this->render('services',
            [
                'result' => $result,
                'address' => $address,
            ]);
    }

}