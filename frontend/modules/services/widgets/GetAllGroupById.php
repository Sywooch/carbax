<?php

namespace frontend\modules\services\widgets;

use common\classes\Debug;
use common\models\db\ServiceAddFields;
use common\models\db\ServiceTypeGroup;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class GetAllGroupById extends Widget
{
    public $groupId;
    public $serviceId;

    public function run(){
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$this->groupId])->all();
        $serviseSelect = ServiceAddFields::find()->where(['service_id'=>$this->serviceId])->all();
        $serviseSelect = ArrayHelper::index($serviseSelect, 'add_fields_id');
        return $this->render('fields_group',
            [
                'groups' => $groups,
                'select' => $serviseSelect,
            ]);
    }
}