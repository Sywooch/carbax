<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 18.07.2016
 * Time: 9:33
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowSidebar extends Widget
{
    public function run(){
        return $this->render('sidebar');
    }

}