<?php

namespace frontend\modules\flea_market\controllers;

use common\classes\Debug;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\CarType;
use common\models\db\CategoriesAuto;
use common\models\db\Favorites;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Market;
use common\models\db\ProductImg;
use common\models\db\Services;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use common\models\db\TofSearchTree;
use common\models\db\TofTypes;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use Yii;
use yii\data\Pagination;
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
        //Yii::$app->session->setFlash('success','Товар успешно обновлен');
        $market = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 0])->all();
        return $this->render('index', ['market' => $market]);
    }

    public function actionSale_auto(){
        $market = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 1])->all();
        return $this->render('sale_auto', ['market' => $market]);
    }

    public function actionAdd()
    {

       /* $tofMan = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $region = GeobaseRegion::find()->orderBy('name')->all();
        $autoType = CategoriesAuto::find()->all();*/
        return $this->render('add'
            /*[
                'tofMan' => $tofMan,
                'region' => $region,
                'autotype' => $autoType,
            ]*/);
    }

    public function actionAdd_to_sql()
    {
        if(isset($_POST['auto_widget'])){
            $market = Market::find()->where(['id' => $_POST['idproduct']])->one();
            $autoWidget = AutoWidget::find()->where(['id' => $_POST['auto_widget']])->one();
            Yii::$app->session->setFlash('success','Товар успешно отредактирован');
        }
        else {
            Yii::$app->session->setFlash('success','Товар успешно добавлен');
            $market = new Market();
            $autoWidget = new AutoWidget();
        }

        $market->name = $_POST['title'];
        $market->new = $_POST['new'];
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
            $autoWidget->moto_type = $_POST['mototype'];
        }

        $autoWidget->brand_name = $manName;
        $autoWidget->model_name = $modelName;
        $autoWidget->type_name = $typeName;

        $autoWidget->save();
        /*$market->man_id = $_POST['manufactures'];
        $market->model_id = $_POST['model'];
        $market->type_id = $_POST['types'];*/
        $market->id_auto_widget = $autoWidget->id;
        $market->region_id = $_POST['region'];
        $market->city_id = $_POST['city'];
        $market->descr = $_POST['descr'];
        $market->price = $_POST['price'];
        if($_POST['prod_type'] == 'zap'){
            $market->prod_type = 0;
            $view = 'index';
        }
        else {
            $market->prod_type = 1;
            $view = 'sale_auto';
        }
        $market->dt_add = time();
        if ($_POST['userOrService'] == 2) {
            $market->service_id = $_POST['selectService'];
        } else {
            $market->service_id = 0;
        }
        if(isset($_POST['sub_cat'])){
            $market->category_id_all = $_POST['main_cat'].',';
            foreach ($_POST['sub_cat'] as $sc) {
                $market->category_id_all .= $sc . ',';
            }
            $market->category_id_all = substr($market->category_id_all, 0, -1);
            $market->category_id = array_pop($_POST['sub_cat']);
        }


        $market->id_auto_type = $_POST['typeAuto'];


        $market->user_id = Yii::$app->user->id;
        $market->save();

        if(!file_exists('media/users/'.Yii::$app->user->id)){
            mkdir('media/users/'.Yii::$app->user->id.'/');
        }
        if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
            mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
        }
        $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';
        $i = 0;

        if(!empty($_FILES['file']['name'][0])){
            ProductImg::deleteAll(['product_id' => $market->id]);
            foreach($_FILES['file']['name'] as $file){
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir.$file);
                $img = new ProductImg();
                $img->product_id = $market->id;
                $img->img = $dir.$file;
                if($file == $_POST['cover']){
                    Debug::prn($_POST['cover']);
                    $img->cover = 1;
                }else{
                    $img->cover = 0;
                }
                $img->save();
                $i++;
            }
        }

        if($_POST['prod_type'] == 'zap'){
            $marketAll = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 0])->all();
        }
        else {
            $marketAll = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 1])->all();
        }

        return $this->render($view,
            [
                'market' => $marketAll,
            ]);
    }

    public function actionView_product()
    {
        $product = Market::find()->where(['id' => $_GET['id']])->one();
        $info = AutoWidget::find()->where(['id' => $product->id_auto_widget])->one();
       /* $nameTypeAuto = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one();
        $marka = TofManufacturers::find()->where(['mfa_id' => $product->man_id])->one();
        $model = TofModels::find()->where(['mod_id' => $product->model_id])->one();
        $type = TofTypes::find()->where(['typ_id' => $product->type_id])->one();
        $region = GeobaseRegion::find()->where(['id' => $product->region_id])->one();
        $city = GeobaseCity::find()->where(['id' => $product->city_id])->one();*/
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;

        foreach ($category as $cat) {
            //Debug::prn($cat);
            $nameCat .= ' / ' . TofSearchTree::find()->where(['str_id' => $cat])->one()->str_des;
        }
        $region = GeobaseRegion::find()->where(['id' => $product->region_id])->one();
        $city = GeobaseCity::find()->where(['id' => $product->city_id])->one();
        return $this->render('view_product',
            [
                'product' => $product,
                'info' => $info,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,
                /*'nametype' => $nameTypeAuto,
                'marka' => $marka,
                'model' => $model,
                'type' => $type,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,*/
            ]);
    }


    public function actionProduct_delite(){
        Market::deleteAll(['id'=>$_GET['id']]);
        if($_GET['type'] == 'auto'){
            $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id, 'prod_type' => 1])->all();
            Yii::$app->session->setFlash('success','Авто успешно удалено');
            return $this->render('sale_auto', ['market' => $marketAll,]);
        }
        else {
            $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id, 'prod_type' => 0])->all();
            Yii::$app->session->setFlash('success','Товар успешно удален');
            return $this->render('index', ['market' => $marketAll,]);
        }
    }

    public function actionEdit_product()
    {
        $product = Market::find()->where(['id' => $_GET['id']])->one();
        $auto = AutoWidget::find()->where(['id' => $product->id_auto_widget])->one();
        /*$tofMan = TofManufacturers::find()->orderBy('mfa_brand')->all();*/
        $region = GeobaseRegion::find()->all();
        /*$autoType = CategoriesAuto::find()->all();*/
        /*$model = TofModels::find()->where(['mod_mfa_id' => $product->man_id])->all();
        $type = TofTypes::find()->where(['typ_mod_id' => $product->model_id])->all();*/
        $city = GeobaseCity::find()->where(['region_id' => $product->region_id])->all();
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;
        //Debug::prn($product->category_id_all);
        foreach ($category as $cat) {
            //Debug::prn($cat);
            $nameCat .= ' - ' . TofSearchTree::find()->where(['str_id' => $cat])->one()->str_des;
        }

        return $this->render('edit',
            [
                'product' => $product,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,
                'auto' => $auto,
                'img' => ProductImg::find()->where(['product_id'=>$_GET['id']])->all()
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
        if($_POST['prod_type'] == 'zap'){
            $product->prod_type = 0;
        }
        else {
            $product->prod_type = 1;
        }
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
            $product->category_id_all = '';
            foreach ($_POST['sub_cat'] as $sc) {
                $product->category_id_all .= $sc . ',';
            }
            $product->category_id = array_pop($_POST['sub_cat']);

        }
        $product->id_auto_type = $_POST['typeAuto'];
        $product->new = $_POST['new'];
        $product->user_id = Yii::$app->user->id;
        $product->save();

        if(!empty($_FILES['file']['name'][0])){
            ProductImg::deleteAll(['product_id' => $_POST['idproduct']]);
            if(!file_exists('media/users/'.Yii::$app->user->id)){
                mkdir('media/users/'.Yii::$app->user->id.'/');
            }
            if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
                mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
            }
            $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';
            $i = 0;

            foreach($_FILES['file']['name'] as $file){
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir.$file);
                $img = new ProductImg();
                $img->product_id = $product->id;
                $img->img = $dir.$file;
                if($file == $_POST['cover']){
                    $img->cover = 1;
                }else{
                    $img->cover = 0;
                }
                $img->save();
                $i++;
            }
        }else{
            $product_img = ProductImg::find()->where(['product_id' => $_POST['idproduct']])->all();
            foreach($product_img as $img){
                if($img->img == $_POST['cover']){
                    $img->cover = 1;
                    $img->save();
                }else{
                    $img->cover = 0;
                    $img->save();
                }
            }
        }
        Yii::$app->session->setFlash('success','Товар успешно обновлен');
        $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id, 'prod_type' => 0])->all();

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
        echo Html::dropDownList('types', 0, ArrayHelper::map($model, 'typ_id', 'typ_mmt_cds'), ['class' => 'addContent__adress', 'id' => 'typeSelect', 'prompt' => 'Выберите тип']);
    }

    public function actionGet_categ(){
        echo CategoryProductTecDoc::widget();
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



        $result = Market::find()
            /*->select([ '`geobase_city`.`name` as `city_name_ttt`', '`market`.*'])*/
            ->leftJoin('auto_widget', '`auto_widget`.`id` = `market`.`id_auto_widget`')
            ->leftJoin('`geobase_city`', '`geobase_city`.`id` = `market`.`city_id`')
            ->leftJoin('`favorites`', '`favorites`.`market_id` = `market`.`id` AND `favorites`.`user_id` = '.Yii::$app->user->id )
            ->filterWhere([
                '`market`.`region_id`' => $_GET['region']

            ])
            ->andFilterWhere(['`market`.`city_id`' => $_GET['citySearch']]);
         if(!empty($_GET['search'])){
             if($_GET['searchName'] == 1){
                 $result->andWhere(['like', '`market`.`name`', $_GET['search']]);
             }
             else{
                 $result->andWhere(['like', '`market`.`name`', $_GET['search']]);
                 $result->orWhere(['like', '`brand_name`', $_GET['search']]);
                 $result->orWhere(['like', '`model_name`', $_GET['search']]);
             }
         }


         if(isset($_GET['newProduct']) && !isset($_GET['by'])){
             $result->andWhere(['new'=>1]);
         }
         if(isset($_GET['by']) && !isset($_GET['newProduct'])){
             $result->andWhere(['new'=>0]);
         }

         if(!empty($_GET['prod_type'])){
             $result->andWhere(['prod_type' => $_GET['prod_type']-1]);
         }
         if(!empty($_GET['typeAuto'])){
             $result->andWhere(['`auto_widget`.`auto_type`' => $_GET['typeAuto']]);
         }
         if($_GET['typeAuto'] == 1 || $_GET['typeAuto'] == 2) {
            if (!empty($_GET['brandSearch'])) {
                $result->andWhere(['`auto_widget`.`brand_id`' => $_GET['brandSearch']]);
            }

            if (!empty($_GET['yearSearch'])) {
                $result->andWhere(['`auto_widget`.`year`' => $_GET['yearSearch']]);
            }
         }

        if($_GET['typeAuto'] == 3) {
            if(!empty($_GET['motoType'])){
                $result->andWhere(['`auto_widget`.`moto_type`' => $_GET['motoType']]);
            }
            if(!empty($_GET['brandMoto'])){
                $result->andWhere(['`auto_widget`.`brand_id`' => $_GET['brandMoto']]);
            }
        }


         if(isset($_GET['categ']) && $_GET['categ'] != 10001){
             $result->andWhere(['like', '`market`.`category_id_all`', $_GET['categ']]);
         }
        $result->with('auto_widget','geobase_city','favorites');
        $result->orderBy('dt_add DESC');

        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $result->count(),
        ]);
        $result->offset($pagination->offset);
        $result->limit($pagination->limit);
        $search = $result->all();
       // Debug::prn($search);
       // Debug::prn($_GET);
        return $this->render('search', ['search'=>$search,'pagination' => $pagination,]);

    }

    public function actionShow_cat()
    {
        echo CategoryProductTecDoc::widget();
    }


    public function actionView(){

        $this->view->params['officeHide'] = true;
        $product = Market::find()->where(['id' => $_GET['id']])->one();

        $product->updateCounters(['views'=>1]);

        $nameTypeAuto = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one();
        $auto = AutoWidget::find()->where(['id'=>$product->id_auto_widget])->one();
       // Debug::prn($product);
       /* $marka = TofManufacturers::find()->where(['mfa_id' => $product->man_id])->one();
        $model = TofModels::find()->where(['mod_id' => $product->model_id])->one();
        $type = TofTypes::find()->where(['typ_id' => $product->type_id])->one();*/
        $region = GeobaseRegion::find()->where(['id' => $product->region_id])->one();
        $city = GeobaseCity::find()->where(['id' => $product->city_id])->one();
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;

        foreach ($category as $cat) {
            //Debug::prn($cat);
            $nameCat .= ' - ' . TofSearchTree::find()->where(['str_id' => $cat])->one()->str_des;
        }
        $images = ProductImg::find()->where(['product_id'=>$_GET['id']])->all();
        $favorites = Favorites::find()->where(['market_id'=>$_GET['id'],'user_id'=>Yii::$app->user->id])->one()->id;
        return $this->render('view',
            [
                'product' => $product,
                'nametype' => $nameTypeAuto,
                'auto' => $auto,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,
                'images' => $images,
                'favorites' => $favorites
            ]);
    }
}
