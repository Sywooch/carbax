<?php

namespace frontend\widgets;


use yii\base\Widget;

class ComfortZone extends Widget
{

    public function run(){
        $comfortZone = \common\models\db\ComfortZone::find()->all();

        return $this->render('comfort_zone', ['cz' => $comfortZone]);
    }

}