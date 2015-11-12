<?php


namespace frontend\widgets;


use yii\base\Widget;

class AutoType extends Widget {
    public function run(){
        $autoType = \common\models\db\AutoType::find()->all();

        return $this->render('auto_type', ['auto' => $autoType]);
    }
} 