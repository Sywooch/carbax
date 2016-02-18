<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 10.02.2016
 * Time: 10:15
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowFooter extends Widget
{
    public function run(){
        return $this->render('footer');
    }
}