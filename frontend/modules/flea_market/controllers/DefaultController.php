<?php

namespace frontend\modules\flea_market\controllers;

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
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\CarType;
use common\models\db\CategoriesAuto;
use common\models\db\Favorites;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\InfoDisk;
use common\models\db\InfoSplint;
use common\models\db\Market;
use common\models\db\ProductImg;
use common\models\db\Reviews;
use common\models\db\Services;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use common\models\db\TofSearchTree;
use common\models\db\TofTypes;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['search','view'],
                        'roles' => ['?'],
                    ],
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
        $market = Market::find()
            ->joinWith('product_img')
            ->where(['`market`.`user_id`' => Yii::$app->user->id, 'prod_type' => 0])
            ->orWhere(['`market`.`user_id`' => Yii::$app->user->id, 'prod_type' => 2])
            ->orWhere(['`market`.`user_id`' => Yii::$app->user->id, 'prod_type' => 3])
            ->orWhere(['`market`.`user_id`' => Yii::$app->user->id, 'prod_type' => 4])
            ->orderBy('dt_add DESC')
            ->all();

        return $this->render('index', ['market' => $market]);
    }

    public function actionSale_auto(){
        $market = Market::find()
            ->joinWith('product_img')
            ->where(['`market`.`user_id`' => Yii::$app->user->id, 'prod_type' => 1])
            ->orderBy('dt_add DESC')
            ->all();


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
        //Debug::prn($_POST);
        if(isset($_POST['auto_widget']) || isset($_POST['id_info_splint']) || isset($_POST['id_info_disk'])){
            $market = Market::find()->where(['id' => $_POST['idproduct']])->one();
            if($_POST['radio_type_product'] == 1) {
                $autoWidget = AutoWidget::find()->where(['id' => $_POST['auto_widget']])->one();
            }
            if($_POST['radio_type_product'] == 2) {
                $infoSplint = InfoSplint::find()->where(['id' => $_POST['id_info_splint']])->one();
            }
            if($_POST['radio_type_product'] == 3) {
                $infoDisk = InfoDisk::find()->where(['id' => $_POST['id_info_disk']])->one();
            }
            Yii::$app->session->setFlash('success','Товар успешно отредактирован и отправлен на модерацию.');
        }
        else {
            Yii::$app->session->setFlash('success','Товар успешно добавлен и отправлен на модерацию.');
            $market = new Market();
            //$autoWidget = new AutoWidget();
        }


        $market->new = $_POST['new'];
        if($_POST['radio_type_product'] == 1) {
            if(isset($_POST['id_widget_auto'])){
                $market->id_auto_widget = $_POST['id_widget_auto'];
            }
            else{
                $autoWidget = new AutoWidget();
                $autoWidget->auto_type = $_POST['typeAuto'];
                $autoWidget->year = $_POST['year'];
                $autoWidget->brand_id = $_POST['manufactures'];
                $autoWidget->model_id = $_POST['model'];
                $autoWidget->type_id = $_POST['types'];
                if ($_POST['typeAuto'] == 1) {
                    $manName = BcbBrands::find()->where(['id' => $_POST['manufactures']])->one()->name;
                    $modelName = BcbModels::find()->where(['id' => $_POST['model']])->one()->name;
                    $typeName = BcbModify::find()->where(['id' => $_POST['types']])->one()->name;
                }
                if ($_POST['typeAuto'] == 2) {
                    $manName = AutoComBrands::find()->where(['id' => $_POST['manufactures']])->one()->name;
                    $modelName = AutoComModels::find()->where(['id' => $_POST['model']])->one()->name;
                    $typeName = AutoComModify::find()->where(['id' => $_POST['model']])->one()->name;

                    $autoWidget->submodel_id = $_POST['submodel'];
                    $autoWidget->submodel_name = AutoComSubmodels::find()->where(['id' => $_POST['submodel']])->one()->name;
                }
                if ($_POST['typeAuto'] == 3) {
                    $manName = CarMark::find()->where(['id_car_mark' => $_POST['manufactures']])->one()->name;
                    $modelName = CarModel::find()->where(['id_car_model' => $_POST['model']])->one()->name;
                    $typeName = CarModification::find()->where(['id_car_modification' => $_POST['types']])->one()->name;
                    $autoWidget->moto_type = $_POST['mototype'];
                }

                $autoWidget->brand_name = $manName;
                $autoWidget->model_name = $modelName;
                $autoWidget->type_name = $typeName;

                $autoWidget->save();
                $market->id_auto_widget = $autoWidget->id;

            }

        }
        if($_POST['radio_type_product'] == 2) {
            $infoSplint = new InfoSplint();
            $infoSplint->diameter = $_POST['diameter'];
            $infoSplint->seasonality = $_POST['seasonality'];
            switch ($_POST['seasonality']) {
                case 1:
                    $infoSplint->seasonality_name = 'Летние';
                    break;
                case 2:
                    $infoSplint->seasonality_name = 'Зимние нешипованные';
                    break;
                case 3:
                    $infoSplint->seasonality_name = 'Зимние шипованные';
                    break;
                case 4:
                    $infoSplint->seasonality_name = 'Всесезонные';
                    break;
            }
            $infoSplint->section_width = $_POST['section_width'];
            $infoSplint->section_height = $_POST['section_height'];
            $infoSplint->save();
            $market->id_info_splint = $infoSplint->id;
        }

        if($_POST['radio_type_product'] == 3) {
            $infoDisk = new InfoDisk();
            $infoDisk->type_disk = $_POST['type_disk'];
            switch ($_POST['type_disk']) {
                case 1:
                    $infoDisk->type_disk_name = 'Кованые';
                    break;
                case 2:
                    $infoDisk->type_disk_name = 'Литые';
                    break;
                case 3:
                    $infoDisk->type_disk_name = 'Штампованные';
                    break;
                case 4:
                    $infoDisk->type_disk_name = 'Спицованные';
                    break;
                case 5:
                    $infoDisk->type_disk_name = 'Сборные';
                    break;
            }
            $infoDisk->diameter = $_POST['diameter'];
            $infoDisk->rim_width = $_POST['rim_width'];
            $infoDisk->number_holes = $_POST['number_holes'];
            $infoDisk->diameter_holest = $_POST['diameter_holest'];
            $infoDisk->sortie = $_POST['sortie'];

            $infoDisk->save();
            $market->id_info_disk = $infoDisk->id;
        }
        $market->region_id = $_POST['region'];
        $market->city_id = $_POST['city'];
        $market->descr = $_POST['descr'];
        $market->price = $_POST['price'];
        if($_POST['prod_type'] == 'zap'){
            $market->prod_type = 0;
            switch($_POST['radio_type_product']){
                case 1:
                    $market->prod_type = 0;//запчасть
                    break;
                case 2:
                    $market->prod_type = 2;//Шины
                    break;
                case 3:
                    $market->prod_type = 3;//Диски
                    break;
            }

            $view = 'index';
            $market->name = $_POST['title'];
        }
        else {


            if(isset($_POST['id_widget_auto'])){
                $market->id_auto_widget = $_POST['id_widget_auto'];
                $autoWidget = AutoWidget::findOne($_POST['id_widget_auto']);
                $autoWidgetParams = AutoWidgetParams::findOne(['id_auto_widget' => $autoWidget->id]);
            }
            else{
                $autoWidget = new AutoWidget();
                $autoWidgetParams = new AutoWidgetParams();
                $autoWidget->auto_type = $_POST['typeAuto'];
                $autoWidget->year = $_POST['year'];
                $autoWidget->brand_id = $_POST['manufactures'];
                $autoWidget->model_id = $_POST['model'];
                $autoWidget->type_id = $_POST['types'];
                if ($_POST['typeAuto'] == 1) {
                    $manName = BcbBrands::find()->where(['id' => $_POST['manufactures']])->one()->name;
                    $modelName = BcbModels::find()->where(['id' => $_POST['model']])->one()->name;
                    $typeName = BcbModify::find()->where(['id' => $_POST['types']])->one()->name;
                }
                if ($_POST['typeAuto'] == 2) {
                    $manName = AutoComBrands::find()->where(['id' => $_POST['manufactures']])->one()->name;
                    $modelName = AutoComModels::find()->where(['id' => $_POST['model']])->one()->name;
                    $typeName = AutoComModify::find()->where(['id' => $_POST['model']])->one()->name;

                    $autoWidget->submodel_id = $_POST['submodel'];
                    $autoWidget->submodel_name = AutoComSubmodels::find()->where(['id' => $_POST['submodel']])->one()->name;
                }
                if ($_POST['typeAuto'] == 3) {
                    $manName = CarMark::find()->where(['id_car_mark' => $_POST['manufactures']])->one()->name;
                    $modelName = CarModel::find()->where(['id_car_model' => $_POST['model']])->one()->name;
                    $typeName = CarModification::find()->where(['id_car_modification' => $_POST['types']])->one()->name;
                    $autoWidget->moto_type = $_POST['mototype'];
                }

                $autoWidget->brand_name = $manName;
                $autoWidget->model_name = $modelName;
                $autoWidget->type_name = $typeName;

                $autoWidget->save();
                $market->id_auto_widget = $autoWidget->id;

                $autoWidgetParams->id_auto_widget = $autoWidget->id;
                $autoWidgetParams->body_type = $_POST['body'];
                $autoWidgetParams->run = $_POST['run'];
                $autoWidgetParams->transmission = $_POST['trans'];
                $autoWidgetParams->type_motor = $_POST['typeMotor'];
                $autoWidgetParams->size_motor = $_POST['size_motor'];
                $autoWidgetParams->drive = $_POST['drive'];
                $autoWidgetParams->vin = $_POST['vin-code'];
                $autoWidgetParams->save();
            }
            $market->prod_type = 1;//Автомобиль
            $view = 'sale_auto';
            $market->name = 'Продам '.$autoWidget->brand_name.', '.$autoWidget->model_name.', '.$autoWidget->year;
        }
        $market->run = $_POST['run'];
        $market->address = $_POST['address'];
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


        if(isset($_POST['typeAuto'])){
            $market->id_auto_type = $_POST['typeAuto'];
        }else{
            $market->id_auto_type = 99;
        }


        $market->published = 0;
        $market->user_id = Yii::$app->user->id;
        $market->phone = $_POST['phone'];
        $market->save();

        /*Добавление изображений*/

        ProductImg::updateAll(['product_id' => $market->id], ['product_id' => 99999, 'user_id' => Yii::$app->user->id]);

        /*Конец добавление изображений*/

        if($_POST['prod_type'] == 'zap'){
            /*$marketAll = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 0])
                ->orWhere(['user_id' => Yii::$app->user->id, 'prod_type' => 2])
                ->orWhere(['user_id' => Yii::$app->user->id, 'prod_type' => 3])
                ->orderBy('dt_add DESC')
                ->all();*/
            return $this->redirect('index');
        }
        else {
            $marketAll = Market::find()->where(['user_id' => Yii::$app->user->id, 'prod_type' => 1])->orderBy('dt_add DESC')->all();
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
            $marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id, 'prod_type' => 1])->orderBy('dt_add DESC')->all();
            Yii::$app->session->setFlash('success','Авто успешно удалено');
            return $this->render('sale_auto', ['market' => $marketAll,]);
        }
        else {
            /*$marketAll = Market::find()->where(['user_id'=>Yii::$app->user->id, 'prod_type' => 0])
                ->orWhere(['prod_type' => 2])
                ->orWhere(['prod_type' => 3])
                ->all();*/
            Yii::$app->session->setFlash('success','Товар успешно удален');
            return $this->redirect('index');
           // return $this->render('index', ['market' => $marketAll,]);
        }
    }

    public function actionEdit_product()
    {
        $product = Market::find()->where(['id' => $_GET['id']])->one();
        if($product->prod_type == 1 || $product->prod_type == 0){
            $auto = AutoWidget::find()->where(['id' => $product->id_auto_widget])->one();
        }
        if($product->prod_type == 2){
            $auto = InfoSplint::find()->where(['id' => $product->id_info_splint])->one();
        }
        if($product->prod_type == 3){
            $auto = InfoDisk::find()->where(['id' => $product->id_info_disk])->one();
        }

        $region = GeobaseRegion::find()->all();

        $city = GeobaseCity::find()->where(['region_id' => $product->region_id])->all();
        $category = explode(',', $product->category_id_all);
        array_pop($category);
        $nameCat = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one()->name;

        foreach ($category as $cat) {

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

        /**
         * Параметры поиска существующие для всех объявлений
         */

        $result = Market::find()
            ->leftJoin('`geobase_city`', '`geobase_city`.`id` = `market`.`city_id`')
            ->leftJoin('auto_widget', '`auto_widget`.`id` = `market`.`id_auto_widget`');
            if(isset(Yii::$app->user->id)){
                $result->leftJoin('`favorites`', '`favorites`.`market_id` = `market`.`id` AND `favorites`.`user_id` = '.Yii::$app->user->id );
            }

            $result->leftJoin('`auto_widget_params`','`auto_widget_params`.`id_auto_widget` = `auto_widget`.`id`')
            ->leftJoin('`info_splint`','`info_splint`.`id` = `market`.`id_info_splint`')
            ->leftJoin('`info_disk`','`info_disk`.`id` = `market`.`id_info_disk`')
            ->filterWhere(
                [
                    '`market`.`region_id`' => $_GET['region']
                ]
            )
            ->andFilterWhere(
                [
                    '`market`.`city_id`' => $_GET['citySearch']
                ]
            )
            ->andWhere(['published'=>1]);

        /**
         * Если введено текстовое поле для поиска
        */

        if(!empty($_GET['search'])){
            /**
             * Если поиск будет только в заголовках
            */
            if($_GET['searchName'] == 1){
                $result->andWhere(['like', '`market`.`name`', $_GET['search']]);
            }
            /**
             * Искать в заголовках в самом объявлении
             */
            else{
                $result->andWhere(['like', '`market`.`name`', $_GET['search']]);
                $result->orWhere(['like', '`brand_name`', $_GET['search']]);
                $result->orWhere(['like', '`model_name`', $_GET['search']]);
            }
        }

        /**
         * Если искать только новые товары
         */
        if(isset($_GET['newProduct']) && !isset($_GET['by'])){
            $result->andWhere(['new'=>1]);
        }
        /**
         * Если искать только Б/У товары
         */

        if(isset($_GET['by']) && !isset($_GET['newProduct'])){
            $result->andWhere(['new'=>0]);
        }

        /**
         * Если выбран тип продукта и не выбран тип авто
         */
        if(!empty($_GET['prod_type']) && empty($_GET['typeAuto'])){
            $result->andWhere(['prod_type' => $_GET['prod_type']-1]);
        }

        /**
         * Если выбрано ТРАНСПОРТ и тип автомобиля
         */

        if(($_GET['prod_type'] == 2) && !empty($_GET['typeAuto'])){
            $result->andWhere(['prod_type' => $_GET['prod_type']-1]);
            $result->andWhere(['`auto_widget`.`auto_type`' => $_GET['typeAuto']]);
            /**
             * Если легковой автомобиль или грузовой
             */
            if($_GET['typeAuto'] == 1 || $_GET['typeAuto'] == 2){
                if(!empty($_GET['brandSearch'])){
                    $result->andWhere(['`auto_widget`.`brand_id`' => $_GET['brandSearch']]);
                }

                if(!empty($_GET['modelAutoSearch'])){
                    $result->andWhere(['`auto_widget`.`model_id`' => $_GET['modelAutoSearch']]);
                }

                if(!empty($_GET['bodySearch'])) {
                    $result->andWhere(['body_type' => $_GET['bodySearch']]);
                }

                if(!empty($_GET['transSearch'])){
                    $result->andWhere(['transmission' => $_GET['transSearch']]);
                }

                if(!empty($_GET['typeMotorSearch'])){
                    $result->andWhere(['type_motor' => $_GET['typeMotorSearch']]);
                }

                if(!empty($_GET['driveSearch'])){
                    $result->andWhere(['drive' => $_GET['driveSearch']]);
                }
            }

            /**
             *Если мото техника
             */
            if($_GET['typeAuto'] == 3){
                if(!empty($_GET['motoType'])){
                    $result->andWhere(['`auto_widget`.`moto_type`' => $_GET['motoType']]);
                }

                if(!empty($_GET['brandSearch'])){
                    $result->andWhere(['`auto_widget`.`brand_id`' => $_GET['brandSearch']]);
                }

                if(!empty($_GET['modelAutoSearch'])){
                    $result->andWhere(['`auto_widget`.`model_id`' => $_GET['modelAutoSearch']]);
                }
            }


            /**
             * Усли выбран год выпуска
             */
            if(!empty($_GET['search_year_from']) || !empty($_GET['search_year_to'])){
                if(empty($_GET['search_year_from'])){
                    $search_year_from = 0;
                }
                else{
                    $search_year_from = $_GET['search_year_from'];
                }

                if(empty($_GET['search_year_to'])){
                    $search_year_to = 99999999;
                }
                else{
                    $search_year_to = $_GET['search_year_to'];
                }
                $result->andWhere('`auto_widget`.`year` BETWEEN ' . $search_year_from . ' and ' . $search_year_to);
            }

            /**
             * Если введен объем двигателя
             */

            if(!empty($_GET['searchSizeMotor_from']) || !empty($_GET['searchSizeMotor_to'])){
                if(empty($_GET['searchSizeMotor_from'])){
                    $searchSizeMotor_from = 0;
                }else{
                    $searchSizeMotor_from = $_GET['searchSizeMotor_from'];
                }

                if(empty($_GET['searchSizeMotor_to'])){
                    $searchSizeMotor_to = 999;
                }
                else {
                    $searchSizeMotor_to = $_GET['searchSizeMotor_to'];
                }

                //Debug::prn($searchSizeMotor_from);
                $result->andWhere('`auto_widget_params`.`size_motor` BETWEEN ' . $searchSizeMotor_from . ' and ' . $searchSizeMotor_to);
            }

            /**
             *Если выбран пробег
             */
            if(!empty($_GET['searchRunFrom']) || !empty($_GET['searchRunTo'])){
                if(empty($_GET['searchRunFrom'])){
                    $searchRunFrom = 0;
                }
                else{
                    $searchRunFrom = $_GET['searchRunFrom'];
                }

                if(empty($_GET['searchRunTo'])){
                    $searchRunTo = 99999999999999999;
                }
                else{
                    $searchRunTo = $_GET['searchRunTo'];
                }
                $result->andWhere('`market`.`run` BETWEEN ' . $searchRunFrom . ' and ' . $searchRunTo);
            }

            /**
             * Если введена цена
             */
            if(!empty($_GET['searchPriceFrom']) || !empty($_GET['searchPriceTo'])){
                if(empty($_GET['searchPriceFrom'])){
                    $searchPriceFrom = 0;
                }
                else{
                    $searchPriceFrom = $_GET['searchPriceFrom'];
                }

                if(empty($_GET['searchPriceTo'])){
                    $searchPriceTo = 99999999999999999999999999999;
                }
                else{
                    $searchPriceTo = $_GET['searchPriceTo'];
                }
                $result->andWhere('`market`.`price` BETWEEN ' . $searchPriceFrom . ' and ' . $searchPriceTo);
            }
        }

        /**
         * Если выбрано ЗАПЧАСТЬ и тип автомобиля
         */
        if(($_GET['prod_type'] == 1) && !empty($_GET['typeAuto'])){
            $result->andWhere(['prod_type' => $_GET['prod_type']-1]);
            $result->andWhere(['`auto_widget`.`auto_type`' => $_GET['typeAuto']]);
        }

        /**
         * Если выбраны Шины
         */
        if(($_GET['prod_type'] == 3)){
            if(!empty($_GET['diameterSplintSearch'])){
                $result->andWhere(['`info_splint`.`diameter`' => $_GET['diameterSplintSearch']]);
            }
            if(!empty($_GET['seasonalitySearch'])){
                $result->andWhere(['`info_splint`.`seasonality`' => $_GET['seasonalitySearch']]);
            }
            if(!empty($_GET['section_widthSearch'])){
                $result->andWhere(['`info_splint`.`section_width`' => $_GET['section_widthSearch']]);
            }
            if(!empty($_GET['section_heightSearch'])){
                $result->andWhere(['`info_splint`.`section_height`' => $_GET['section_heightSearch']]);
            }
        }

        /**
         * Если выбраны Диски
         */
        if(($_GET['prod_type'] == 4)){
            if(!empty($_GET['typeDiskSearch'])){
                $result->andWhere(['`info_disk`.`type_disk`' => $_GET['typeDiskSearch']]);
            }
            if(!empty($_GET['typeDiameterDiskSearch'])){
                $result->andWhere(['`info_disk`.`diameter`' => $_GET['typeDiameterDiskSearch']]);
            }
            if(!empty($_GET['rim_widthSearch'])){
                $result->andWhere(['`info_disk`.`rim_width`' => $_GET['rim_widthSearch']]);
            }
            if(!empty($_GET['number_holesSearch'])){
                $result->andWhere(['`info_disk`.`number_holes`' => $_GET['number_holesSearch']]);
            }
            if(!empty($_GET['diameter_holestSearch'])){
                $result->andWhere(['`info_disk`.`diameter_holest`' => $_GET['diameter_holestSearch']]);
            }
            if(!empty($_GET['sortieSearch'])){
                $result->andWhere(['`info_disk`.`sortie`' => $_GET['sortieSearch']]);
            }
        }



        /**
         * Если выбрана категория
         */
         if(isset($_GET['categ']) && $_GET['categ'] != 10001){
             $result->andWhere(['like', '`market`.`category_id_all`', $_GET['categ']]);
         }
        $result->with('auto_widget','geobase_city','favorites','auto_widget_params');
        $result->orderBy('dt_add DESC');

        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $result->count(),
        ]);
        $result->offset($pagination->offset);
        $result->limit($pagination->limit);
        $search = $result->all();
        //Debug::prn($search);
        $cityName = '';
        $regionName = '';
        if(!empty($_GET['region'])){
            $region = GeobaseRegion::find()->where(['id' => $_GET['region']])->one();
            $regionName = $region->name . ' | ';
        }
        if(!empty($_GET['citySearch'])){
            $city = GeobaseCity::find()->where(['id' => $_GET['citySearch']])->one();
            $cityName = $city->name . ' | ';
        }

        $title = 'Объявления CARBAX | ';
        $keywords = 'Объявления CARBAX,';

        if(!empty($_GET['prod_type'])){
            switch($_GET['prod_type']){
                case 2:
                    $title .= "Транспорт | $regionName $cityName";
                    $keywords .= "Транспорт $region->name $city->name,";
                    break;
                case 1:
                    $title .= "Запчасти | $regionName $cityName";
                    $keywords .= "Запчасти $region->name $city->name,";
                    break;
                case 3:
                    $title .= "Шины | $regionName $cityName";
                    $keywords .= "Шины $region->name $city->name,";
                    break;
                case 4:
                    $title .= "Диски | $regionName $cityName";
                    $keywords .= "Диски $region->name $city->name,";
                    break;
            }

        }else{
            $title .=  $regionName . $cityName;
            $keywords .= $regionName . $cityName;
        }


        $title .= 'CARBAX все автоуслуги Вашего города';
        $keywords .= 'CARBAX все автоуслуги Вашего города';
        //Debug::prn($keywords);

        return $this->render('search',
            [
                'search'=>$search,
                'pagination' => $pagination,
                'title' => $title,
                'keywords' => $keywords,
            ]);

    }

    public function actionShow_cat()
    {
        echo CategoryProductTecDoc::widget();
    }


    public function actionView(){

        $this->view->params['officeHide'] = true;
        $product = Market::find()->where(['id' => $_GET['id']])->one();

        $product->updateCounters(['views'=>1]);

        /*$nameTypeAuto = CategoriesAuto::find()->where(['id' => $product->id_auto_type])->one();*/
        if($product->prod_type == 0 || $product->prod_type == 1){
            $auto = AutoWidget::find()->where(['id'=>$product->id_auto_widget])->one();
            $autoParams = AutoWidgetParams::findOne(['id_auto_widget'=>$auto->id]);
        }

        if($product->prod_type == 2){
            $auto = InfoSplint::find()->where(['id'=>$product->id_info_splint])->one();
        }
        if($product->prod_type == 3){
            $auto = InfoDisk::find()->where(['id'=>$product->id_info_disk])->one();
        }
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

        $countReviews = Reviews::find()->where(['publ' => 1, 'flea_market' => 1, 'spirit_id' => $_GET['id']])->count();

        return $this->render('view',
            [
                'product' => $product,
                /*'nametype' => $nameTypeAuto,*/
                'auto' => $auto,
                'region' => $region,
                'city' => $city,
                'category' => $nameCat,
                'images' => $images,
                'favorites' => $favorites,
                'autoParams' => $autoParams,
                'countReviews' => $countReviews,
            ]);
    }

}
