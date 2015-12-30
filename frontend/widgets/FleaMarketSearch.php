<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 19.11.2015
 * Time: 12:37
 */

namespace frontend\widgets;


use common\models\db\BcbBrands;
use common\models\db\GeobaseRegion;
use common\models\db\TofManufacturers;
use common\models\db\TofSearchTree;
use yii\base\Widget;

class FleaMarketSearch extends Widget
{

    public $title = true;

    public function run(){
        $cat = TofSearchTree::find()->where(['str_id_parent'=>'10001'])->all();
        $region = GeobaseRegion::find()->orderBy('name')->all();
        $manufactures = BcbBrands::find()->orderBy('name')->all();

        return $this->render('search', ['region'=>$region,  'title'=>$this->title]);
    }

}