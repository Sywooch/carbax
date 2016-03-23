<?php

namespace frontend\modules\favorites\widgets;
use yii\base\Widget;

class FavoritesMenu extends Widget
{
    public function run(){
        return $this->render('menu');
    }
}