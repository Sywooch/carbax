<?php


namespace frontend\widgets;



use common\models\db\ServiceAutoType;
use common\models\db\ServiceBrandCars;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class AutoType extends Widget {
    public $serviceId;
    public function run(){
        $autoType = \common\models\db\AutoType::find()->all();
        $autoTypeSelect = ServiceAutoType::find()->where(['service_id'=>$this->serviceId])->all();
        $autoTypeSelect = ArrayHelper::index($autoTypeSelect, 'auto_type_id');

       /* /*---Редактирование брендов--
        $selectBrand = ServiceBrandCars::find()->where(['service_id'=>$this->serviceId,'type'=>1])->all();*/
        return $this->render('auto_type',
            [
                'auto' => $autoType,
                'autoSelect' => $autoTypeSelect,
                'serviceId' => $this->serviceId,
            ]);
    }
} 