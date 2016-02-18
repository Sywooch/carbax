<?php

namespace frontend\modules\news\controllers;


use common\models\db\News;
use common\classes\Debug;
use common\models\search\newsSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\LinkPager;
use yii\filters\VerbFilter;



class NewsController extends \yii\web\Controller
{
	public $layout = 'page';

    public function actionIndex()
	{
		$this->view->params['officeHide'] = true;
		$this->view->params['bannersHide'] = false;
		$query = News::find();
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$pages->pageSize = 10;
		$models = $query->offset($pages->offset)
			->limit($pages->limit)
			->orderBy('id DESC')
			->all();
		return $this->render('index', [
			'news' => $models,
			'pages' => $pages,
		]);
	}
	public function actionView($id)
	{	$this->view->params['officeHide'] = true;
		$this->view->params['bannersHide'] = false;
		//$news = News::find()->where(['id'=>$id])->one();
		$news = News::findOne($id);
		$news->views++;
		$news->save();
		//Debug::prn($news);
		return $this->render('view', [
			'news' => $news
		]);
	}

}
