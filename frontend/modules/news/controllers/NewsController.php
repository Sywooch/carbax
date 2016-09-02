<?php

namespace frontend\modules\news\controllers;


use common\models\db\CategoryNews;
use common\models\db\News;
use common\classes\Debug;
use common\models\db\Seo;
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
		$this->view->params['bannersHide'] = true;
		$query = News::find();
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$pages->pageSize = 10;
		$models = $query->offset($pages->offset)
			->limit($pages->limit)
			->orderBy('id DESC')
			->all();

		$catInfo = Seo::find()->where(['name_page_key'=>'allNews'])->one();
		return $this->render('index', [
			'news' => $models,
			'pages' => $pages,
			'titleNews' => 'Все новости',
			'catInfo' => $catInfo,
		]);
	}
	public function actionView($id)
	{	$this->view->params['officeHide'] = true;
		$this->view->params['bannersHide'] = false;
		$news = News::find()
			->leftJoin('`category_news`','`category_news`.`id` = `news`.`cat_id`')
			->where(['`news`.`id`'=>$id])
			->with('category_news')
			->one();
		//$news = News::findOne($id);
		$news->views++;
		$news->save();
		//Debug::prn($news->createCommand()->rawSql);
		//Debug::prn($news);
		return $this->render('view', [
			'news' => $news
		]);
	}

	public function actionAll_news_cat(){
		$this->view->params['officeHide'] = true;
		$this->view->params['bannersHide'] = true;

		$news = News::find()->where(['cat_id' => $_GET['id']]);
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $news->count(),
		]);

		$models = $news->orderBy('id DESC')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();

		return $this->render('index', [
			'news' => $models,
			'pages' => $pagination,
			'catInfo' => CategoryNews::find()->where(['id' => $_GET['id']])->one(),
		]);
	}

	public function actionGet_news_cat(){
		$id = $_POST['id'];

		if($id != 0){
			$news = News::find()->where(['cat_id' => $id])->orderBy('dt_add')->limit(6)->all();
		}
		else{
			$news = News::find()->orderBy('dt_add DESC')->limit(6)->all();
		}

		return $this->renderPartial('news-cat-home',['news' => $news]);
	}
}
