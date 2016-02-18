<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 11.01.2016
 * Time: 14:30
 */

namespace frontend\widgets;
use yii\base\Widget;

class InfoSplint extends Widget
{
    public $model = false;
    public function run(){
        return $this->render('splint',['model'=>$this->model]);
    }
}