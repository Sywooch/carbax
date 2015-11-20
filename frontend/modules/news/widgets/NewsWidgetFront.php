<?php

namespace frontend\modules\news\widgets;

use common\classes\Debug;
use common\models\db\News;
use himiklab\ipgeobase\IpGeoBase;
use yii\base\Widget;
use yii\db\Query;

class NewsWidgetFront extends Widget
{

    public function run(){
        $news = (new Query())->from('news')->limit(3)->orderBy('id DESC')->all();
        //Debug::prn($news);
        return $this->render('news', ['news' => $news]);

    }

}