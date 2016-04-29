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
            ->where(['cat_id' => $this->idCat])
            ->andWhere(['!=', 'id', $this->idNews])
            ->orderBy('dt_add DESC')
            ->limit(5)
            ->all();

        return $this->render('similar-news',['news'=>$news]);
    }

}