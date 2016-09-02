<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 18.07.2016
 * Time: 9:15
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        return $this->render('header');
    }
}