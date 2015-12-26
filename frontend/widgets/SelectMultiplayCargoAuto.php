<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 25.12.2015
 * Time: 12:50
 */

namespace frontend\widgets;


use common\models\db\AutoComBrands;
use common\models\db\ServiceBrandCars;
use yii\base\Widget;

class SelectMultiplayCargoAuto extends Widget
{
    public $serviceId;
    public function run(){
        $markAuto = AutoComBrands::find()->orderBy('name')->all();
        foreach ($markAuto as $ma) {
            $markAutoArray[$ma->id] = $ma->name;
        }

        $selMark = ServiceBrandCars::find()->where(['service_id'=>$this->serviceId,'type'=>2])->all();
        foreach ($selMark as $sm) {
            $selMarkArray[$sm->brand_cars_id] = $sm->brand_cars_id;
        }

        return $this->render('sel_mult_cargo_auto',
            [
                'mark' => $markAutoArray,
                'selMark'=>$selMarkArray,
            ]);
    }
}