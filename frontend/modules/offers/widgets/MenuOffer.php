<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 18.02.2016
 * Time: 13:27
 */

namespace frontend\modules\offers\widgets;


use common\models\db\ServiceType;
use yii\base\Widget;

class MenuOffer extends Widget
{
    public function run(){
        $serviceType = ServiceType::find()->all();
        return $this->render('menuOffers',['srviceType'=>$serviceType]);
    }
}