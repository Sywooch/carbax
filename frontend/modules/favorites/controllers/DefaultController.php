<?php

namespace frontend\modules\favorites\controllers;

use common\classes\Debug;
use common\models\db\Favorites;
use common\models\db\Market;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send_request' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
       /* $this->view->params['officeHide'] = true;*/
        $this->view->params['bannersHide'] = true;
       $product = Market::find()
           ->leftJoin('`favorites`', '`favorites`.`market_id` = `market`.`id`')
           ->leftJoin('`product_img`', '`product_img`.`product_id` = `market`.`id`')
           ->leftJoin('`geobase_city`', '`geobase_city`.`id` = `market`.`city_id`')
           ->where(['`favorites`.`user_id`' => Yii::$app->user->id])
           ->with('product_img','geobase_city')
           ->all();

        //Debug::prn($product);
        return $this->render('index',['product'=>$product]);
    }
}
