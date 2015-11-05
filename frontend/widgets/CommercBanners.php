<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 12.10.2015
 * Time: 15:20
 */

namespace frontend\widgets;

use yii\base\Widget;

class CommercBanners extends Widget
{
    public $print;

    public function run(){
        if(!$this->print){
            return $this->render('banners');
        }
    }
}