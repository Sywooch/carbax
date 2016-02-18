<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 25.01.2016
 * Time: 13:07
 */

namespace frontend\widgets;


use common\classes\Address;
use common\classes\Debug;
use common\models\db\Market;
use yii\base\Widget;

class FleaMarketNewProduct extends Widget
{
    public function run(){
        $address = Address::get_geo_info();
        $title = 'Свежие объявления';
        $product = Market::find()
            ->joinWith('product_img')
            ->where(['region_id'=>$address['region_id'],'published'=>1])
            ->groupBy('`market`.`id`')
            ->orderBy('dt_add DESC')
            //->with('product_img')
            ->limit(4)

            ->all();

        //Debug::prn($product->createCommand()->rawSql);
        return $this->render('new_product',
            [
                'product'   => $product,
                'title'     => $title,
            ]);
    }
}