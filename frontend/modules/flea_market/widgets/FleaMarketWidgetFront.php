<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 19.07.2016
 * Time: 14:55
 */

namespace frontend\modules\flea_market\widgets;


use common\classes\Address;
use common\classes\Debug;
use common\models\db\Market;
use yii\base\Widget;

class FleaMarketWidgetFront extends Widget
{
    public function run(){

        $address = Address::get_geo_info();

        $product = Market::find()
            ->joinWith('product_img')
            ->leftJoin('auto_widget', '`auto_widget`.`id` = `market`.`id_auto_widget`')
            ->leftJoin('auto_widget_params', '`auto_widget_params`.`id_auto_widget` = `market`.`id_auto_widget`')
            ->where(['region_id'=>$address['region_id'], 'published'=>1, 'prod_type' => 1, 'id_auto_type' => 1])
            ->groupBy('`market`.`id`')
            ->orderBy('dt_add DESC')
            ->with('auto_widget','auto_widget_params')
            ->limit(6)
            ->all();
        // Debug::prn($product->createCommand()->rawSql);


        return $this->render('flea-market',
            [
                'product' => $product,
            ]);
    }

}