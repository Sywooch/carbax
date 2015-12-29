<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 26.12.2015
 * Time: 11:49
 */

namespace frontend\widgets;


use common\models\db\CarMark;
use common\models\db\ServiceBrandCars;
use yii\base\Widget;

class SelectMultiplayMoto extends Widget
{
    public $serviceId;
    public function run(){
        $markAuto = CarMark::find()->orderBy('name')->all();
        foreach ($markAuto as $ma) {
            $markAutoArray[$ma->id_car_mark] = $ma->name;
        }

        $selMark = ServiceBrandCars::find()->where(['service_id'=>$this->serviceId,'type'=>3])->all();
        foreach ($selMark as $sm) {
            $selMarkArray[$sm->brand_cars_id] = $sm->brand_cars_id;
        }

        return $this->render('sel_mult_moto',
            [
                'mark' => $markAutoArray,
                'selMark'=>$selMarkArray,
            ]);
    }
}