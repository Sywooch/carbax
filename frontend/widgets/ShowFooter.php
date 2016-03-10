<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 10.02.2016
 * Time: 10:15
 */

namespace frontend\widgets;


use common\classes\Address;
use common\classes\Debug;
use yii\base\Widget;

class ShowFooter extends Widget
{

    public function run(){
        $address = Address::get_geo_info();
        return $this->render('footer',['address' => $address]);
    }
}