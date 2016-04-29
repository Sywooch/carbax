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
use common\models\db\CategoryNews;
use yii\base\Widget;

class ShowFooter extends Widget
{

    public function run(){
        $catNews = CategoryNews::find()->limit(4)->all();
        $address = Address::get_geo_info();
        return $this->render('footer',
            [
                'address' => $address,
                'catNews' => $catNews,
            ]);
    }
}