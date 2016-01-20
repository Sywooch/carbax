<?php

namespace frontend\modules\garage\controllers;

use common\classes\Debug;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\AutoWidgetParams;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarMarkByType;
use common\models\db\CarModel;
use common\models\db\CarModification;
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
            if(isset($_POST['garageId'])){
                $garage = Garage::find()->where(['id' => $_POST['garageId']])->one();
                $autoWidget = AutoWidget::find()->where(['id' => $_POST['autoId']])->one();
                $autoWidgetParams = AutoWidgetParams::findOne(['id_auto_widget' => $autoWidget->id]);
                Yii::$app->session->setFlash('success','Транспорт успешно обновлен');
            }
            else {
                $garage = new Garage();
                $autoWidget = new AutoWidget();
                $autoWidgetParams = new AutoWidgetParams();
                Yii::$app->session->setFlash('success','Транспорт успешно добавлен');
            }

            $autoWidget->auto_type = $_POST['typeAuto'];
            $autoWidget->year = $_POST['year'];
            $autoWidget->brand_id = $_POST['manufactures'];
            $autoWidget->model_id = $_POST['model'];
            $autoWidget->type_id = $_POST['types'];
            if($_POST['typeAuto'] == 1){
                $manName = BcbBrands::find()->where(['id'=>$_POST['manufactures']])->one()->name;
                $modelName = BcbModels::find()->where(['id'=>$_POST['model']])->one()->name;
                $typeName = BcbModify::find()->where(['id'=>$_POST['types']])->one()->name;
            }
            if($_POST['typeAuto'] == 2){
                $manName = AutoComBrands::find()->where(['id'=>$_POST['manufactures']])->one()->name;
                $modelName = AutoComModels::find()->where(['id'=>$_POST['model']])->one()->name;
                $typeName = AutoComModify::find()->where(['id'=>$_POST['model']])->one()->name;

                $autoWidget->submodel_id = $_POST['submodel'];
                $autoWidget->submodel_name = AutoComSubmodels::find()->where(['id'=>$_POST['submodel']])->one()->name;
            }
            if($_POST['typeAuto'] == 3){
                $manName = CarMark::find()->where(['id_car_mark'=>$_POST['manufactures']])->one()->name;
                $modelName = CarModel::find()->where(['id_car_model'=>$_POST['model']])->one()->name;
                $typeName = CarModification::find()->where(['id_car_modification'=>$_POST['types']])->one()->name;
                $autoWidget->year = 0;
            }
            $autoWidget->brand_name = $manName;
            $autoWidget->model_name = $modelName;
            $autoWidget->type_name = $typeName;

            $garage->comments = $_POST['comments'];
            $garage->dt_add = time();
            $garage->user_id = Yii::$app->user->id;
            $garage->vin = $_POST['vin-code'];

            $garage->title = $manName . ' / ' . $modelName;


            $autoWidget->save();
            $garage->id_auto_widget = $autoWidget->id;

            $autoWidgetParams->id_auto_widget = $autoWidget->id;
            $autoWidgetParams->body_type = $_POST['body'];
            $autoWidgetParams->run = $_POST['run'];
            $autoWidgetParams->transmission = $_POST['trans'];
            $autoWidgetParams->type_motor = $_POST['typeMotor'];
            $autoWidgetParams->size_motor = $_POST['size_motor'];
            $autoWidgetParams->drive = $_POST['drive'];
            $autoWidgetParams->vin = $_POST['vin-code'];
            $autoWidgetParams->save();

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
     * @param integer $id
     * @return mixed
     */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        $autoWidget = AutoWidget::find()->where(['id' => $model->id_auto_widget])->one();
        //Debug::prn($autoWidget);
        return $this->render('_form', ['model' => $model, 'auto' => $autoWidget]);
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

        echo 'Готово';
    }

    public function actionInsert_table_cargoauto_year(){
        $brandsAll = AutoComBrands::find()->all();
       // Debug::prn($brandsAll);

        foreach ($brandsAll as $br) {
           // Debug::prn(AutoComModify::find()->where(['brand_id'=>$br->id])->min('release_from'));
            $cargoauto = new CargoautoYear();
            $cargoauto->id_brand = $br->id;
            $cargoauto->name = $br->name;
            $min_y =  AutoComModify::find()->where(['brand_id'=>$br->id])->min('release_from');
            $cargoauto->min_y = (empty($min_y)) ?  1970 : $min_y;

            $max_y = AutoComModify::find()->where(['brand_id'=>$br->id])->max('release_to');
            $cargoauto->max_y = (empty($max_y)) ?  2015 : $max_y;
            $cargoauto->save();
        }

        echo 'Готово';

    }

    public function actionChange_brand_name(){
        $model = AutoComBrands::find()->where(['group' => 'artic'])->all();
        foreach($model as $m){
            $to = AutoComBrands::find()->where(['like', 'name', $m->name])->all();
            //Debug::prn($to);
            if(count($to) > 1){
                $m->name .= ' (Тягачи)';
                //Debug::prn($m);
                $m->save();
            }
        }
        echo "Готово";
    }

    public function actionCar_mark_by_type(){
        $model = CarMarkByType::find()->where(['id_car_type'=>'26'])->all();
        foreach ($model as $m) {
            $to = CarMarkByType::find()->where(['like','id_car_type',$m->id_car_type])->all();
            if(count($to) > 1){
                $m->name .= ' (снегоходы)';
                $m->save();
            }
        }
        echo 'Готово';
    }
}
