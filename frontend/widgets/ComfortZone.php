<?php

namespace frontend\widgets;


use common\models\db\ServiceComfortZone;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class ComfortZone extends Widget
{
    public $serviceId;

    public function run(){
        $comfortZone = \common\models\db\ComfortZone::find()->all();
        $comfortZoneSelect = ServiceComfortZone::find()->where(['service_id'=>$this->serviceId])->all();
        $comfortZoneSelect = ArrayHelper::index($comfortZoneSelect, 'comfort_zone_id');
        return $this->render('comfort_zone',
            [
                'cz' => $comfortZone,
                'czs' => $comfortZoneSelect,
            ]);
    }
}