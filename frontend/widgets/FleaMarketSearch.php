<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 19.11.2015
 * Time: 12:37
 */

namespace frontend\widgets;


use common\models\db\GeobaseRegion;
use common\models\db\TofManufacturers;
use common\models\db\TofSearchTree;
use yii\base\Widget;

class FleaMarketSearch extends Widget
{

    public $title = true;

    public function run(){
        $cat = TofSearchTree::find()->where(['str_id_parent'=>'10001'])->all();
        $region = GeobaseRegion::find()->all();
        $manufactures = TofManufacturers::find()->all();

        return $this->render('search', ['cat'=>$cat, 'region'=>$region, 'manufactures'=>$manufactures, 'title'=>$this->title]);
    }

}