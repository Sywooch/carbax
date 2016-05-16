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
   // Debug::prn($this->catid);
        $title = 'Похожие объявления';
        $productInfo = Market::find()->where(['id' => $this->id])->one();

        if($this->catid == 0){
            $product = Market::find()
                ->joinWith('product_img')
                ->where(['region_id'=>$productInfo->region_id, 'published'=>1, 'prod_type'=>$productInfo->prod_type])
                ->andWhere(['!=','`market`.`id`',$this->id])
                ->orderBy('dt_add DESC')
                //->with('product_img')
                ->limit(4)

                ->all();
        }else{
            //$address = Address::get_geo_info();

            $product = Market::find()
                ->joinWith('product_img')
                ->where(['region_id'=>$productInfo->region_id, 'published'=>1, 'category_id'=>$this->catid])
                ->andWhere(['!=','`market`.`id`',$this->id])
                ->orderBy('dt_add DESC')
                //->with('product_img')
                ->limit(4)

                ->all();
        }




        return $this->render('similar_ads',
            [
                'product'   => $product,
                'title'     => $title,
            ]);
    }
}