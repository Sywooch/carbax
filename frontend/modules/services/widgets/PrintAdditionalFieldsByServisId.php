<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.11.2015
 * Time: 11:23
 */

namespace frontend\modules\services\widgets;


use common\classes\Debug;
use common\models\db\AdditionalFields;
use common\models\db\ServiceAddFields;
use yii\base\Widget;

class PrintAdditionalFieldsByServisId extends Widget{
    public $servicId;

    public function run(){
        $groups = ServiceAddFields::find()->where(['service_id'=>$this->servicId])->all();
        foreach($groups as $gr){
            $typyjob[] = AdditionalFields::find()->where(['id'=>$gr->add_fields_id])->one();

        }

        foreach($typyjob as $type){
            $group_id[] = $type->group_id;
        }

        $group_id = array_unique($group_id);
        return $this->render('additional_fields',
            [
                'group' => $group_id,
                'type' => $typyjob
            ]);
    }
} 