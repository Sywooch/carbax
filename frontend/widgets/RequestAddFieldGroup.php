<?php

namespace frontend\widgets;

use common\classes\Debug;
use common\models\db\RequestAdditionalFields;
use common\models\db\RequestTypeGroup;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class RequestAddFieldGroup extends Widget
{
    public $groupId;
    public $requestId;

    public function run(){
        //$groups = ServiceTypeGroup::find()->where(['service_type_id'=>$this->groupId])->all();
        //$groups = AddFieldsGroup::find()->where(['id'=>$this->groupId])->all();
        $groupRequest = RequestTypeGroup::find()->where(['request_type_id'=>$this->groupId])->all();
        $requestSelect = RequestAdditionalFields::find()->where(['request_id'=>$this->requestId])->all();
        $requestSelect = ArrayHelper::index($requestSelect, 'add_field_id');

        return $this->render('request_add_field_group',
            [
                'groups' => $groupRequest,
                'select'=>$requestSelect,
            ]);
    }
}