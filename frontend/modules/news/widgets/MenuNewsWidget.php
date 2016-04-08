<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 08.04.2016
 * Time: 8:55
 */

namespace frontend\modules\news\widgets;


use common\models\db\CategoryNews;
use yii\base\Widget;

class MenuNewsWidget extends Widget
{
    public function run(){
        $categoruNews = CategoryNews::find()->all();
        return $this->render('cat_news',['category' => $categoruNews]);
    }
}