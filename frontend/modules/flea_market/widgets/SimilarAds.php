<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 01.12.2015
 * Time: 12:59
 */

namespace frontend\modules\flea_market\widgets;


use common\classes\Debug;
use common\models\db\Market;
use yii\base\Widget;

class SimilarAds extends Widget
{
    public $catid;
    public $id;
    public function run(){

        $product = Market::find()->where(['category_id'=>$this->catid])->andWhere(['!=','id',$this->id])->limit(4)->all();
       if(!empty($product)) {
           return $this->render('similar_ads', ['product' => $product]);
       }
    }
}