<?php

namespace backend\modules\news\controllers;

use serhatozles\simplehtmldom\SimpleHTMLDom;
use Yii;
use common\models\db\News;
use common\classes\Debug;
use common\models\search\newsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new newsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionParse_news()
    {
        $modelNewsOld = News::find()->count();
        $xml = simplexml_load_file('http://www.gazeta.ru/export/rss/auto.xml');
        foreach ($xml->channel->item as $it){
           $model = new News();
           $html = SimpleHTMLDom::file_get_html($it->link);// ($it->link);
           $element=$html->find('.main_pick img');

           $model->img_url = $element[0]->src;

           $title = (array)$it->title;
           $model->title = $title[0];

           $description = (array)$it->description;
           $model->description = $description[0];

           $short_description = (array)$it->description;
           $model->short_description = $short_description[0];
           $dt_add = (array)$it->pubDate;
           $dt_add_timecode = strtotime($dt_add[0]);
           $model->dt_add = $dt_add_timecode;
//           Debug::prn($model);
           $model->save();

        }
        $modelNewsNew = News::find()->count();
        $newsCount = $modelNewsNew - $modelNewsOld;
        return $this->render('parser', [
            'news' => $newsCount
        ]);
    }
}
