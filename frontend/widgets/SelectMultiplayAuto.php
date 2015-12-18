<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 04.12.2015
 * Time: 11:20
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\BcbBrands;
use common\models\db\ServiceBrandCars;
use common\models\db\TofManufacturers;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class SelectMultiplayAuto extends Widget
{
    public $serviceId;
    public function run(){
        //$markAuto = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $markAuto = BcbBrands::find()->orderBy('name')->all();
        foreach ($markAuto as $ma) {
            $markAutoArray[$ma->id] = $ma->name;
        }
        $selMark = ServiceBrandCars::find()->where(['service_id'=>$this->serviceId])->all();
        foreach ($selMark as $sm) {
            $selMarkArray[$sm->brand_cars_id] = $sm->brand_cars_id;
        }

        return $this->render('sel_mult_auto',
            [
                'mark' => $markAutoArray,
                'selMark'=>$selMarkArray,
            ]);
    }
}