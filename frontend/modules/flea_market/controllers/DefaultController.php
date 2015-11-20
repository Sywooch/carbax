<?php

namespace frontend\modules\flea_market\controllers;

use common\classes\Debug;
use common\models\db\CategoriesAuto;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Market;
use common\models\db\Services;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use common\models\db\TofSearchTree;
use common\models\db\TofTypes;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add_to_sql' => ['post'],
                    'update_to_sql' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'add_to_sql') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        if ($action->id == 'update_to_sql') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public $layout = 'page';

    public function actionIndex()
    {
        $market = Market::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('index', ['market' => $market]);
    }

    public function actionAdd()
    {
        $tofMan = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $region = GeobaseRegion::find()->all();
        $autoType = CategoriesAuto::find()->all();
        return $this->render('add',
            [
                'tofMan' => $tofMan,
                'region' => $region,
                'autotype' => $autoType,
            ]);
    }

    public function actionAdd_to_sql()
    {
        $market = new Market();
        $market->name = $_POST['title'];
        $market->man_id = $_POST['manufactures'];
        $market->model_id = $_POST['model'];
        $market->type_id = $_POST['types'];
        $market->region_id = $_POST['region'];
        $market->city_id = $_POST['city'];
        $market->descr = $_POST['descr'];
        $market->price = $_POST['price'];
        $market->dt_add = time();
        if ($_POST['userOrService'] == 2) {
            $market->service_id = $_POST['selectService'];
        } else {
            $market->service_id = 0;
        }
        foreach ($_POST['sub_cat'] as $sc) {
            $market->category_id_all .= $sc . ',';
        }

        $market->category_id = array_pop($_POST['sub_cat']);
        $market->id_auto_type = $_POST['autotype'];
        $market->user_id = Yii::$app->user->id;
        $market->save();

        Yii::$app->session->setFlash('succcess','Товар успешно добавлен');

        $marketAll = Market::find()->where(['user_id' => Yii::$app->user->id])->all();

        return $this->render('index',
            [
                'market' => $marketAll,
            ]);
    }

    public function actionView_product()
    {
        $product = Market::find()->where(['id' => $_GET['id']])->one();
        $nameTypeAuto = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one();
        $marka = TofManufacturers::find()->where(['mfa_id' => $product->man_id])->one();
        $model = TofModels::find()->where(['mod_id' => $product->model_id])->one();
        $type = TofTypes::find()->where(['typ_id' => $product->type_id])->one();
        $region = GeobaseRegion::find()->where(['id' => $product->region_id])->one();
        $city = GeobaseCity::find()->where(['id' => $product->city_id])->one();
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;

        foreach ($category as $cat) {
            //Debug::prn($cat);
            $nameCat .= ' / ' . TofSearchTree::find()->where(['str_id_parent' => $cat])->one()->str_des;
        }

        //Debug::prn($region);
        return $this->render('view_product',
            [
                'product' => $product,
                'nametype' => $nameTypeAuto,
                'marka' => $marka,
                'model' => $model,
                'type' => $type,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,
            ]);
    }


    public function actionProduct_delite(){
        Market::deleteAll(['id'=>$_GET['id']]);
        $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id])->all();
        Yii::$app->session->setFlash('succcess','Товар успешно удален');
        return $this->render('index',
            [
                'market' => $marketAll,
            ]);
    }

    public function actionEdit_product()
    {
        $product = Market::find()->where(['id' => $_GET['id']])->one();
        $tofMan = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $region = GeobaseRegion::find()->all();
        $autoType = CategoriesAuto::find()->all();
        $model = TofModels::find()->where(['mod_mfa_id' => $product->man_id])->all();
        $type = TofTypes::find()->where(['typ_mod_id' => $product->model_id])->all();
        $city = GeobaseCity::find()->where(['region_id' => $product->region_id])->all();
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;

        foreach ($category as $cat) {
            //Debug::prn($cat);
            $nameCat .= ' / ' . TofSearchTree::find()->where(['str_id_parent' => $cat])->one()->str_des;
        }

        return $this->render('edit',
            [
                'product' => $product,
                'tofMan' => $tofMan,
                'region' => $region,
                'autotype' => $autoType,
                'model' => $model,
                'type' => $type,
                'city' => $city,
                'category' => $nameCat,
            ]);
    }
    

    public function actionUpdate_to_sql()
    {
        $product = Market::find()->where(['id' => $_POST['idproduct']])->one();
        $product->name = $_POST['title'];
        $product->man_id = $_POST['manufactures'];
        $product->model_id = $_POST['model'];
        $product->type_id = $_POST['types'];
        $product->region_id = $_POST['region'];
        $product->city_id = $_POST['city'];
        $product->descr = $_POST['descr'];
        $product->price = $_POST['price'];
        $product->dt_add = time();
        if ($_POST['userOrService'] == 2) {
            $product->service_id = $_POST['selectService'];
        } else {
            $product->service_id = 0;
        }


        if (isset($_POST['category_id_all'])) {
            $product->category_id_all = $_POST['category_id_all'];
            $product->category_id = $_POST['category_id'];
            $product->id_auto_type = $_POST['id_auto_type'];
        } else {
            foreach ($_POST['sub_cat'] as $sc) {
                $product->category_id_all .= $sc . ',';
            }
            $product->category_id = array_pop($_POST['sub_cat']);
            $product->id_auto_type = $_POST['autotype'];
        }

        $product->user_id = Yii::$app->user->id;
        $product->save();
        $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id])->all();
        Yii::$app->session->setFlash('succcess','Товар успешно обновлен');
        return $this->render('index',
            [
                'market' => $marketAll,
            ]);

    }

    public function actionGet_model()
    {
        $model = TofModels::find()->where(['mod_mfa_id' => $_POST['mfa_id']])->all();
        echo Html::dropDownList('model', 0, ArrayHelper::map($model, 'mod_id', 'mod_name'), ['class' => 'addContent__adress', 'id' => 'modSelect', 'prompt' => 'Выберите модель']);
    }

    public function actionGet_types()
    {
        $model = TofTypes::find()->where(['typ_mod_id' => $_POST['mod_id']])->all();
        echo Html::dropDownList('types', 0, ArrayHelper::map($model, 'typ_id', 'typ_mmt_cds'), ['class' => 'addContent__adress', 'prompt' => 'Выберите тип']);
    }

    public function actionGet_city()
    {
        $city = GeobaseCity::find()->where(['region_id' => $_POST['reg_id']])->all();
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'), ['class' => 'addContent__adress', 'prompt' => 'Выберите город']);

    }

    public function actionGet_service()
    {
        $service = Services::find()->where(['user_id' => Yii::$app->user->id])->all();
        echo Html::dropDownList('selectService', 0, ArrayHelper::map($service, 'id', 'name'), ['class' => 'addContent__adress', 'prompt' => 'Выберите сервис']);
    }

    public function actionGet_parent_category()
    {
        $parent = TofSearchTree::find()->where(['str_id_parent' => $_POST['id']])->all();
        echo Html::dropDownList('parentCategory', 0, ArrayHelper::map($parent, 'id', 'str_des'), ['class' => 'addContent__adress']);
    }

    public function actionGet_cat()
    {
        $cat = TofSearchTree::find()->where(['str_id_parent' => $_POST['cat_id']])->all();
        if ($cat) {
            echo Html::dropDownList('sub_cat[]', 0, ArrayHelper::map($cat, 'str_id', 'str_des'), ['class' => 'addContent__adress catSel', 'prompt' => 'Выберите Категорию']);
        }
    }

    public function actionSearch()
    {
        $this->view->params['officeHide'] = true;
        $this->view->params['bannersHide'] = true;

        $result = Market::find()->filterWhere([
            'region_id' => $_GET['region'],
            'man_id' => $_GET['manufactures']
        ]);
        if(!empty($_GET['search'])){
            $result->andWhere(['like', 'name', $_GET['search']]);
        }
        if(!empty($_GET['categ'])){
            $result->andWhere(['like', 'category_id_all', $_GET['categ']]);
        }
        $search = $result->all();
        /*Debug::prn($search);*/

        return $this->render('search', ['search'=>$search]);
    }

    public function actionShow_cat()
    {
        echo CategoryProductTecDoc::widget();
    }
}
