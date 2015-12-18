<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 11:35
 */

namespace frontend\widgets;


use common\models\db\BcbBrands;
use common\models\db\TofManufacturers;
use yii\base\Widget;

class SelectAuto extends Widget
{
    public $view = '1';

    public function run(){
        //$man = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $man = BcbBrands::find()->orderBy('name')->all();
        return $this->render('select_auto', [
            'man' => $man,
            'view'=>$this->view,
        ]);
    }
}