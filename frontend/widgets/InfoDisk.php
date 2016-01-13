<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 12.01.2016
 * Time: 8:43
 */

namespace frontend\widgets;
use yii\base\Widget;

class InfoDisk extends Widget
{
    public $model = false;
    public function run(){
        return $this->render('info_disk',['model'=>$this->model]);
    }
}