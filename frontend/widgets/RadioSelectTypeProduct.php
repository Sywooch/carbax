<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 11.01.2016
 * Time: 13:49
 */

namespace frontend\widgets;
use yii\base\Widget;

class RadioSelectTypeProduct extends Widget
{
    public $select = null;
    public $model = false;
    public $cat = false;

    public function run(){
        return $this->render('radio_select',['select' => $this->select,'model' => $this->model,'cat'=>$this->cat]);
    }
}