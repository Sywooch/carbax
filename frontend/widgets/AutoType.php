<?php


namespace frontend\widgets;



use common\models\db\ServiceAutoType;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class AutoType extends Widget {
    public $serviceId;
    public function run(){
        $autoType = \common\models\db\AutoType::find()->all();
        $autoTypeSelect = ServiceAutoType::find()->where(['service_id'=>$this->serviceId])->all();
        $autoTypeSelect = ArrayHelper::index($autoTypeSelect, 'auto_type_id');
        return $this->render('auto_type',
            [
                'auto' => $autoType,
                'autoSelect' => $autoTypeSelect,
            ]);
    }
} 