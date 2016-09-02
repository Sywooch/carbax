<?php

namespace frontend\modules\reklama\controllers;

use common\models\db\GeobaseRegion;
use common\models\db\Reclame;
use common\models\db\ReclameRegionId;
use common\models\db\ReclameZone;
use Yii;
use yii\debug\models\search\Debug;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `reklama` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

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

    public $layout = 'page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['bannersHide'] = true;
        return $this->render('index');
    }

    public function actionAdd_promo(){
        $this->view->params['bannersHide'] = true;
        $model = new Reclame();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           /* \common\classes\Debug::prn($_POST);*/
            //\common\classes\Debug::prn($_FILES);
            $model->dt_add = time();
            $model->template_id = $_POST['Reclame']['tamplate_id'];
            $model->used = 0;
            if(!file_exists('media/users/'.Yii::$app->user->id)){
                mkdir('media/users/'.Yii::$app->user->id.'/');
            }
            if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
                mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
            }
            $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';
            move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
            $model->images = $dir.$_FILES['file']['name'];
            $model->save();

            switch ($_POST['regionSel']){
                case 1:
                    $reclameRegion = new ReclameRegionId();
                    $reclameRegion->reclame_id = $model->id;
                    $reclameRegion->region_id = 999999;
                    $reclameRegion->save();
                    break;
                case 2:
                    $reclameRegion = new ReclameRegionId();
                    $reclameRegion->reclame_id = $model->id;
                    $reclameRegion->region_id = 105;
                    $reclameRegion->save();
                    break;
                case 3:
                    $reclameRegion = new ReclameRegionId();
                    $reclameRegion->reclame_id = $model->id;
                    $reclameRegion->region_id = 105;
                    $reclameRegion->save();
                    $reclameRegion = new ReclameRegionId();
                    $reclameRegion->reclame_id = $model->id;
                    $reclameRegion->region_id = 39;
                    $reclameRegion->save();
                    break;
                case 4:
                    foreach ($_POST['regionSelId'] as $item) {
                        $reclameRegion = new ReclameRegionId();
                        $reclameRegion->reclame_id = $model->id;
                        $reclameRegion->region_id = $item;
                        $reclameRegion->save();
                    }
                    break;
            }

            Yii::$app->session->setFlash('success','Рекламная компания добавлена и отпралена на модерацию.');

            return $this->redirect(['my_promo']);
        } else {
            $reclamZoneId = ReclameZone::find()->all();
            $region = GeobaseRegion::find()->orderBy('name ASC')->all();
            return $this->render('add_promo', [
                'model' => $model,
                'reclamZoneId' => $reclamZoneId,
                'region' => $region,
            ]);
        }

    }

    public function actionMy_promo(){
        $this->view->params['bannersHide'] = true;
        $reclama = Reclame::find()
            ->leftJoin('reclame_template', '`reclame_template`.`id` = `reclame`.`template_id`')
            ->where(['user_id' => Yii::$app->user->id, 'type_id' => 2])
            ->orderBy('dt_add DESC')
            ->with('reclame_template')
            ->all();
        return $this->render('my_promo',
            [
                'reclama' => $reclama,
            ]
        );
    }


}
