<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 25.01.2016
 * Time: 15:07
 */

namespace frontend\widgets;


use common\classes\Address;
use common\models\db\Market;
use yii\base\Widget;

class FleaMarketMostViewed extends Widget
{
    public function run(){
        $title = 'ЧАСТО ПРОСМАТРИВАЕМЫЕ';
        $address = Address::get_geo_info();
        $product = Market::find()
            ->joinWith('product_img')
            ->where(['region_id'=>$address['region_id'],'published'=>1])
            ->groupBy('`market`.`id`')
            ->orderBy('views DESC')
            ->limit(4)
            ->all();

        //Debug::prn($product);
        return $this->render('new_product',
            [
                'product'   =>  $product,
                'title'     =>  $title,
            ]);
    }
}