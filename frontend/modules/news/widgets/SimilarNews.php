<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 27.04.2016
 * Time: 15:11
 */

namespace frontend\modules\news\widgets;


use common\classes\Debug;
use common\models\db\News;
use yii\base\Widget;

class SimilarNews extends Widget
{
    public $idNews;
    public $idCat;

    public function run(){
        $news = News::find()
            ->leftJoin('category_news', '`category_news`.`id` = `news`.`cat_id`')
            ->where(['`news`.`cat_id`' => $this->idCat])
            ->andWhere(['!=', '`news`.`id`', $this->idNews])
            ->with('category_news')
            ->orderBy('dt_add DESC')
            ->limit(4)
            ->all();

        return $this->render('similar-news',['news'=>$news]);
    }

}