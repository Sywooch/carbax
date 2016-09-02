<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 01.06.2016
 * Time: 11:07
 */

namespace frontend\modules\reklama\widgets;


use yii\base\Widget;

class ReklamaMenu extends Widget
{
    public function run()
    {
        return $this->render('menu');
    }
}