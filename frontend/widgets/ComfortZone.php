<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 09.11.2015
 * Time: 10:56
 */

namespace frontend\widgets;


use yii\base\Widget;

class ComfortZone extends Widget
{

    public function run(){
        $comfortZone = \common\models\db\ComfortZone::find()->all();

        return $this->render('comfort_zone', ['cz' => $comfortZone]);
    }

}