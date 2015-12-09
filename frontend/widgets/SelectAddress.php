<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 30.11.2015
 * Time: 11:39
 */

namespace frontend\widgets;


use common\models\db\GeobaseRegion;
use yii\base\Widget;

class SelectAddress extends Widget
{

    public $address = true;

    public function run(){
        $regions = GeobaseRegion::find()->orderBy('name')->all();
        return $this->render('select_address', ['regions' => $regions, 'address' => $this->address]);
    }

}