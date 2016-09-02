<?php

namespace frontend\modules\news\widgets;

use common\classes\Debug;
use common\models\db\CategoryNews;
use common\models\db\News;
use himiklab\ipgeobase\IpGeoBase;
use yii\base\Widget;
use yii\db\Query;

class NewsWidgetFront extends Widget
{

    public function run(){
        $news = (new Query())->from('news')->orderBy('dt_add')->limit(6)->orderBy('id DESC')->all();
        $category = CategoryNews::find()->all();
        //Debug::prn($news);
        return $this->render('news',
            [
                'news' => $news,
                'category' => $category,
            ]);

    }

}