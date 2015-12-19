<?php

namespace frontend\modules\garage\controllers;

use common\classes\Debug;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BrendYear;
use common\models\db\Garage;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use Yii;
use frontend\modules\garage\models\GarageSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GarageController implements the CRUD actions for Garage model.
 */
class GarageController extends Controller
{
    public $layout = 'page';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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

    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Garage models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(isset($_POST['manufactures'])){
            $garage = new Garage();
            $garage->comments = $_POST['comments'];
            $garage->man_id = $_POST['manufactures'];
            $garage->model_id = $_POST['models'];
            $garage->type_id = $_POST['types'];
            $garage->dt_add = time();
            $garage->user_id = Yii::$app->user->id;

            $manName = TofManufacturers::find()->where(['mfa_id'=>$_POST['manufactures']])->one()->mfa_brand;
            $modelName = TofModels::find()->where(['mod_id' => $_POST['models']])->one()->mod_name;

            $garage->title = $manName . ' / ' . $modelName;
            $garage->save();
        }
        $user = Yii::$app->user->id;
        $model = new Garage();
        $car = $model->find()->where(['user_id'=>$user])->all();
        return $this->render('index', [
            'car' => $car,
        ]);
    }

    /**
     * Displays a single Garage model.
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
     * Creates a new Garage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Garage();
        $user = Yii::$app->user->id;
        $model->user_id = $user;

        return $this->render('_form', ['model' => $model]);
    }

    /**
     * Updates an existing Garage model.
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
     * Deletes an existing Garage model.
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
     * Finds the Garage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Garage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Garage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd(){

    }

    public function actionInsert_table_brends_year(){
        $brandsAll = BcbBrands::find()->all();

        foreach ($brandsAll as $br) {
            $by = new BrendYear();
            $by->id_brand = $br->id;
            $by->name = $br->name;
            $by->min_y = BcbModels::find()
                            ->select('`bcb_models`.`id`, MIN(y_from) AS min_y')
                            ->leftJoin('bcb_modify', '`bcb_modify`.`model_id` = `bcb_models`.`id`')
                            ->where(['brand_id' => $br->id])
                            ->with('bcb_modify')
                            ->min('y_from');
            $by->max_y = BcbModels::find()
                            ->select('`bcb_models`.`id`, MIN(y_from) AS min_y')
                            ->leftJoin('bcb_modify', '`bcb_modify`.`model_id` = `bcb_models`.`id`')
                            ->where(['brand_id' => $br->id])
                            ->with('bcb_modify')
                            ->max('y_to');
            $by->save();
        }

        echo '123';

    }
}
