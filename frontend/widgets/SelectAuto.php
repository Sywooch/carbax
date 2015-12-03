<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 11:35
 */

namespace frontend\widgets;


use common\models\db\TofManufacturers;
use yii\base\Widget;

class SelectAuto extends Widget
{
    public function run(){
        $man = TofManufacturers::find()->orderBy('mfa_brand')->all();
        return $this->render('select_auto', ['man' => $man]);
    }
}