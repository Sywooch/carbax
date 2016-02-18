<?php


namespace frontend\widgets;



use common\classes\Debug;
use common\models\db\ServiceAutoType;
use common\models\db\ServiceBrandCars;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class AutoType extends Widget {
    public $serviceId;
    public $view;
    public $viewBrandAuto;
    public function run(){

        //Debug::prn($this->view);

        if($this->view == 1){

            $serviceAutoType = ServiceAutoType::find()->where(['service_id'=>$this->serviceId])->all();
            foreach($serviceAutoType as $st){
                $autoType[] = \common\models\db\AutoType::find()->where(['id'=>$st->auto_type_id])->one();
            }
            return $this->render('auto_type_view',['autoType'=>$autoType]);
            //Debug::prn($autoType);

        }else{
        $autoType = \common\models\db\AutoType::find()->all();
        $autoTypeSelect = ServiceAutoType::find()->where(['service_id'=>$this->serviceId])->all();
        $autoTypeSelect = ArrayHelper::index($autoTypeSelect, 'auto_type_id');


        return $this->render('auto_type',
            [
                'auto' => $autoType,
                'autoSelect' => $autoTypeSelect,
                'serviceId' => $this->serviceId,
                'viewBrandAuto' => $this->viewBrandAuto,
            ]);
        }
    }
} 