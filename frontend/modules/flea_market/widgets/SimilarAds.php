<?php
/**
 * Created by PhpStorm.
 * User: ����
 * Date: 01.12.2015
 * Time: 12:59
 */

namespace frontend\modules\flea_market\widgets;


use common\classes\Address;
use common\classes\Debug;
use common\models\db\Market;
use yii\base\Widget;

class SimilarAds extends Widget
{
    public $catid;
    public $id;
    public function run(){

        /*$product = Market::find()
            ->joinWith('product_img')
            ->where(['category_id'=>$this->catid])
            ->andWhere(['!=','id',$this->id])
            ->limit(4)
            ->all();*/


        $address = Address::get_geo_info();
        $title = 'Похожие объявления';
        $product = Market::find()
            ->joinWith('product_img')
            ->where(['region_id'=>$address['region_id'], 'published'=>1, 'category_id'=>$this->catid])
            ->andWhere(['!=','`market`.`id`',$this->id])
            ->orderBy('dt_add DESC')
            //->with('product_img')
            ->limit(4)

            ->all();

      /* if(!empty($product)) {
           return $this->render('similar_ads', ['product' => $product]);
       }*/

        return $this->render('similar_ads',
            [
                'product'   => $product,
                'title'     => $title,
            ]);
    }
}