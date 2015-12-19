<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 14.12.2015
 * Time: 11:30
 */

namespace frontend\widgets;


use common\models\db\TofManufacturers;
use yii\base\Widget;

class SelectAutoNew extends Widget
{

    public $category = false;

    function run(){
        $manufactures = TofManufacturers::find()->orderBy('mfa_brand')->all();
        return $this->render('select_auto_new', ['man' => $manufactures]);
    }

}