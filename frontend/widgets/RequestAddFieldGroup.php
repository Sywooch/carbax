<?php

namespace frontend\widgets;

use common\models\db\RequestTypeGroup;
use yii\base\Widget;

class RequestAddFieldGroup extends Widget
{
    public $groupId;

    public function run(){
        //$groups = ServiceTypeGroup::find()->where(['service_type_id'=>$this->groupId])->all();
        //$groups = AddFieldsGroup::find()->where(['id'=>$this->groupId])->all();
        $groupRequest = RequestTypeGroup::find()->where(['request_type_id'=>$this->groupId])->all();
        return $this->render('request_add_field_group',
            [
                'groups' => $groupRequest,
            ]);
    }
}