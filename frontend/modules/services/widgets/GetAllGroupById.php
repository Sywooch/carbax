<?php

namespace frontend\modules\services\widgets;

use common\models\db\ServiceTypeGroup;
use yii\base\Widget;

class GetAllGroupById extends Widget
{
    public $groupId;

    public function run(){
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$this->groupId])->all();
        return $this->render('fields_group', ['groups' => $groups]);
    }
}