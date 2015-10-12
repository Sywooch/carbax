<?php
namespace frontend\modules\services\widgets;

use common\models\db\ServiceType;

class ServiceTypeList extends \yii\base\Widget
{
    public $type = 0;

    public function run(){
        $serviceTypes = ServiceType::find()->all();

        return $this->render('select', ['service' => $serviceTypes]);
    }

    public function test(){
        $serviceType = new ServiceType();

        $serviceType->test();
    }
}