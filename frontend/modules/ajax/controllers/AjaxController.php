<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 12:20
 */

namespace frontend\modules\ajax\controllers;


use common\classes\Address;
use common\classes\Custom_function;
use common\classes\Debug;
use common\classes\Parser;
use common\classes\SendingMessages;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\AutoWidgetParams;
use common\models\db\AwpBodyType;
use common\models\db\AwpDrive;
use common\models\db\AwpTransmission;
use common\models\db\AwpTypeMotor;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarMarkByType;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\CarType;
use common\models\db\Favorites;
use common\models\db\Garage;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Market;
use common\models\db\Msg;
use common\models\db\Offers;
use common\models\db\OffersAttend;
use common\models\db\OffersImages;
use common\models\db\ProductImg;
use common\models\db\ReclameTemplate;
use common\models\db\ReclameZone;
use common\models\db\Request;
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestAdditionalFields;
use common\models\db\Reviews;
use common\models\db\Services;
use common\models\db\ServicesImg;
use common\models\db\TofModels;
use common\models\db\TofSearchTree;
use common\models\db\TofTypes;
use common\models\db\User;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use frontend\modules\request\widget\AutoGarage;
use frontend\widgets\GetSubCategory;
use frontend\widgets\InfoDisk;
use frontend\widgets\InfoSplint;
use frontend\widgets\SelectAuto;
use frontend\widgets\SelectAutoFromGarage;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;

class AjaxController extends Controller
{

    public function actionGet_auto()
    {
        if ($_POST['type'] == 'typeAuto') {
            if ($_POST['id'] == 1) {
                $man = BcbBrands::find()->orderBy('name')->all();
                echo Html::dropDownList(
                    'manufactures',
                    0,
                    ArrayHelper::map($man, 'id', 'name'),
                    ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'man']);
            }
            if ($_POST['id'] == 2) {
                $man = AutoComBrands::find()->orderBy('name')->all();
                echo Html::dropDownList(
                    'manufactures',
                    0,
                    ArrayHelper::map($man, 'id', 'name'),
                    ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'cargoman']);
            }
            if ($_POST['id'] == 3) {
                $type = CarType::find()->all();
                echo Html::dropDownList(
                    'mototype',
                    0,
                    ArrayHelper::map($type, 'id_car_type', 'name'),
                    ['prompt' => 'Выберите тип', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'motocartype']
                );
            }
        }
        if ($_POST['type'] == 'man') {
            $year = BrendYear::find()->where(['id_brand' => $_POST['id']])->one();
            if ($year->max_y == 9999) {
                $yearEnd = 2015;
            } else {
                $yearEnd = $year->max_y;
            }
            $yearAll = [];
            for ($i = $year->min_y; $i <= $yearEnd; $i++) {
                $yearAll[$i] = $i;
            }
            echo Html::dropDownList('year', 0, $yearAll, ['prompt' => 'Год выпуска', 'class' => 'addContent__adress year_select_car', 'id' => 'selectAutoWidget', 'type' => 'mod']);
        }
        if ($_POST['type'] == 'mod') {
            $model = BcbModels::find()
                ->select('`bcb_models`.`id`, `bcb_models`.`name`')
                ->leftJoin('`bcb_modify`', '`bcb_modify`.`model_id` = `bcb_models`.`id`')
                ->where(['brand_id' => $_POST['brandId']])
                ->andWhere(['<=', '`bcb_modify`.`y_from`', $_POST['id']])
                ->andWhere(['>=', '`bcb_modify`.`y_to`', $_POST['id']])
                ->all();
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );

        }
        if ($_POST['type'] == 'typ') {
            $model = BcbModify::find()->where(['model_id' => $_POST['id']])
                ->andWhere(['<=', 'y_from', $_POST['year']])
                ->andWhere(['>=', 'y_to', $_POST['year']])->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
            if ($_POST['view'] == 1) {
                echo CategoryProductTecDoc::widget();
            }

        }
        if ($_POST['type'] == 'group') {
            if ($_POST['view'] == 1) {
                echo CategoryProductTecDoc::widget();
            }
        }

        if ($_POST['type'] == 'cargoman') {
            $year = CargoautoYear::find()->where(['id_brand' => $_POST['id']])->one();
            $yearAll = [];
            for ($i = $year->min_y; $i <= $year->max_y; $i++) {
                $yearAll[$i] = $i;
            }
            echo Html::dropDownList('year', 0, $yearAll, ['prompt' => 'Год выпуска', 'class' => 'addContent__adress year_select_car', 'id' => 'selectAutoWidget', 'type' => 'cargomod']);
        }

        if ($_POST['type'] == 'cargomod') {
            $model = AutoComModels::find()
                ->select('`auto_com_models`.`id`, `auto_com_models`.`name`')
                ->leftJoin('`auto_com_modify`', '`auto_com_modify`.`model_id` = `auto_com_models`.`id`')
                ->where(['`auto_com_models`.`brand_id`' => $_POST['brandId']])
                ->andWhere(['<=', '`auto_com_modify`.`release_from`', $_POST['id']])
                ->andWhere(['>=', '`auto_com_modify`.`release_to`', $_POST['id']])
                ->all();
            //Debug::prn($model);
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'cargosubmod']
            );
        }

        if ($_POST['type'] == 'cargosubmod') {
            // Debug::prn($_POST);
            $model = AutoComSubmodels::find()
                ->select('`auto_com_submodels`.`id`,`auto_com_submodels`.`name`')
                ->leftJoin('`auto_com_modify`', '`auto_com_modify`.`submodel_id` = `auto_com_submodels`.`id`')
                ->where(['`auto_com_modify`.`model_id`' => $_POST['id']])
                ->andWhere(['<=', '`auto_com_modify`.`release_from`', $_POST['year']])
                ->andWhere(['>=', '`auto_com_modify`.`release_to`', $_POST['year']])
                ->all();

            echo Html::dropDownList(
                'submodel',
                0,
                ArrayHelper::map($model, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'cargotyp']
            );
        }

        if ($_POST['type'] == 'cargotyp') {
            $model = AutoComModify::find()
                ->where(['submodel_id' => $_POST['id']])
                ->andWhere(['<=', '`release_from`', $_POST['year']])
                ->andWhere(['>=', '`release_to`', $_POST['year']])
                ->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
        }

        if ($_POST['type'] == 'motocartype') {
            $man = CarMark::find()->where(['id_car_type' => $_POST['id']])->orderBy('name')->all();
            echo Html::dropDownList(
                'manufactures',
                0,
                ArrayHelper::map($man, 'id_car_mark', 'name'),
                ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'motooman']
            );
        }

        if ($_POST['type'] == 'motooman') {
            $model = CarModel::find()->where(['id_car_mark' => $_POST['id']])->orderBy('name')->all();
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model, 'id_car_model', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'mototype']
            );
        }

        if ($_POST['type'] == 'mototype') {
            $model = CarModification::find()->where(['id_car_model' => $_POST['id']])->orderBy('name')->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model, 'id_car_modification', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
        }
    }

    public function actionGet_region_select()
    {
        $regions = GeobaseRegion::find()->orderBy('name')->all();
        echo Html::dropDownList('region', 0, ArrayHelper::map($regions, 'id', 'name'), ['id' => 'selectRegionWidgetEdit', 'prompt' => 'Регион', 'class' => 'addContent__adress']);
    }

    public function actionGet_city_select()
    {
        $city = GeobaseCity::find()->where(['region_id' => $_POST['id']])->all();
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'), ['id' => 'selectCityWidgetEdit', 'prompt' => 'Город', 'class' => 'addContent__adress']);
    }

    public function actionGet_garage()
    {
        echo SelectAutoFromGarage::widget();
    }

    public function actionGet_category_select()
    {
        if ($_POST['type'] == 'zap') {
            echo CategoryProductTecDoc::widget();
        }
    }

    public function actionGet_tel_user()
    {
        echo Market::find()->where(['id' => $_POST['id']])->one()->phone;
    }

    public function actionGet_auto_new()
    {
        if ($_POST['step'] == 'man') {
            $max = TofModels::find()->select('mod_pcon_start')->where(['mod_mfa_id' => 504])->max('mod_pcon_start');
            $min = TofModels::find()->select('mod_pcon_start')->where(['mod_mfa_id' => 504])->min('mod_pcon_start');
            $max = substr($max, 0, 4);
            $min = substr($min, 0, 4);
            Debug::prn($max);
        }
        if ($_POST['type'] == 'mod') {
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map(TofTypes::find()->where(['typ_mod_id' => $_POST['id']])->all(), 'typ_id', 'typ_mmt_cds'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );
        }
    }

    public function actionGet_request_type()
    {
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id, 'request_type_id' => $_POST['id']])->all();

        if (!empty($requests)) {
            echo $html = $this->renderPartial('request', ['requests' => $requests]);
        }

    }

    public function actionGet_raply()
    {
        $message = Msg::find()->where(['to' => Yii::$app->user->id, 'to_type' => 'request', 'type_id' => $_POST['type']])->all();
        if (!empty($message)) {
            echo $this->renderPartial('message', ['message' => $message]);
        } else {
            echo "На вашу заявку ни кто не откликнулся";
        }
    }

    public function actionReset_request()
    {
        $region = RequestAddFieldValue::find()->where(['request_id' => $_POST['id'], 'key' => 'regions'])->one();
        $city = RequestAddFieldValue::find()->where(['request_id' => $_POST['id'], 'key' => 'city_widget'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id' => $_POST['id'], 'key' => 'manufactures'])->one();
        $fields = [];
        $fieldsAll = RequestAdditionalFields::find()->where(['request_id' => $_POST['id']])->all();
        foreach ($fieldsAll as $fl) {
            $fields[] = $fl->add_field_id;
        }
        //Debug::prn($region->value);
        $services = Services::find()
            ->joinWith(['address', 'service_add_fields', 'service_brand_cars'])
            ->where([
                'address.region_id' => $region->value,
                'address.city_id' => $city->value,
                'service_brand_cars.brand_cars_id' => $manufactures->value,
                'service_add_fields.add_fields_id' => $fields
            ])
            ->all();

        $ids = [];

        foreach ($services as $service) {
            $msg = $this->generateRequestMsg($_POST['id']);
            SendingMessages::send_message($service->user_id, Yii::$app->user->id, 'Заявка на сервис ' . $service->name, $msg, 'request', '0', $_POST['id']);
            $ids[] = $service->id;
        }
        echo 'Заявка отправлена';
    }

    public function generateRequestMsg($info)
    {
        $title = RequestAddFieldValue::find()->where(['request_id' => $info, 'key' => 'title'])->one();
        $descr = RequestAddFieldValue::find()->where(['request_id' => $info, 'key' => 'comm'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id' => $info, 'key' => 'manufactures'])->one();
        $data['title'] = $title->value;
        $data['descr'] = $descr->value;
        $data['brand_car'] = $manufactures->value;
        return $this->renderPartial('request_msg_tpl', $data);
    }

    public function actionGet_hidden_auto()
    {
        $garage = Garage::find()->where(['id' => $_POST['id']])->one();
        $auto = AutoWidget::find()->where(['id' => $garage->id_auto_widget])->one();
        echo Html::input('hidden', 'typeAuto', $auto->auto_type);
        echo Html::input('hidden', 'id_widget_auto', $auto->id);
        /*echo Html::input('hidden','year',$auto->year);
        echo Html::input('hidden','model',$auto->model_id);
        echo Html::input('hidden','types',$auto->type_id);
        echo Html::input('hidden','submodel',$auto->submodel_id);*/
    }

    public function actionGet_select_auto()
    {
        echo Custom_function::getByType($_POST['type'], 'nameWidget');
    }

    public function actionAuto_complete()
    {
        //$regions = GeobaseRegion::find()->all();

        $city = GeobaseCity::find()
            ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
            ->with('geobase_region')
            ->all();

        foreach ($city as $c) {
            //Debug::prn($c['geobase_region'][0]->name);
            $r[] = $c->name . " (" . $c['geobase_region'][0]->name . ")";
        }
        return $this->render('auto_complete', ['regions' => $r]);
    }

    public function actionGet_select_city()
    {
        if ($_POST['reg'] != 0) {
            $city = GeobaseCity::find()->where(['region_id' => $_POST['reg']])->all();
            echo Html::dropDownList(
                'citySearch',
                0,
                ArrayHelper::map($city, 'id', 'name'),
                ['prompt' => 'Город', 'class' => 'citySearch',]
            );
        }
    }

    public function actionGet_select_brand_auto()
    {
        if ($_POST['type'] == 1) {
            $brand = BcbBrands::find()->orderBy('name')->all();
            $drive = AwpDrive::find()->all();
            $body = AwpBodyType::find()->all();
            $typeMotor = AwpTypeMotor::find()->all();
            $trans = AwpTransmission::find()->all();
            /*echo Html::dropDownList(
                'brandSearch',
                0,
                ArrayHelper::map($brand,'id','name'),
                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
            );*/
            echo $this->renderPartial('autoSearch',
                [
                    'brand' => $brand,
                    'drive' => $drive,
                    'body' => $body,
                    'typeMotor' => $typeMotor,
                    'trans' => $trans,
                ]);
        }
        if ($_POST['type'] == 2) {
            $brand = AutoComBrands::find()->orderBy('name')->all();
            /*echo Html::dropDownList(
                'brandSearch',
                0,
                ArrayHelper::map($brand,'id','name'),
                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
            );*/
            echo $this->renderPartial('cargoAutoSearch', ['brand' => $brand]);
        }
        if ($_POST['type'] == 3) {
            $carType = CarType::find()->orderBy('name')->all();
            /*echo Html::dropDownList(
                'motoType',
                0,
                ArrayHelper::map($brand,'id_car_type','name'),
                ['prompt' => 'Тип', 'class' => 'motoTypeSearch']
            );*/
            echo $this->renderPartial('motoSearch', ['carType' => $carType]);
        }
    }

    public function actionGet_select_model()
    {
        //Легковой автомобиль
        if ($_POST['type'] == 1) {
            $model = BcbModels::find()->where(['brand_id' => $_POST['idBrand']])->orderBy('name')->all();
            echo Html::dropDownList('modelAutoSearch', 0, ArrayHelper::map($model, 'id', 'name'), ['prompt' => 'Модель', 'class' => 'modelAutoSearch']);
        }
        if ($_POST['type'] == 2) {
            $model = AutoComModels::find()->where(['brand_id' => $_POST['idBrand']])->orderBy('name')->all();
            echo Html::dropDownList('modelAutoSearch', 0, ArrayHelper::map($model, 'id', 'name'), ['prompt' => 'Модель', 'class' => 'modelAutoSearch']);
        }
        if ($_POST['type'] == 3) {
            $model = CarModel::find()->where(['id_car_mark' => $_POST['idBrand']])->orderBy('name')->all();
            echo Html::dropDownList('modelAutoSearch', 0, ArrayHelper::map($model, 'id_car_model', 'name'), ['prompt' => 'Модель', 'class' => 'modelAutoSearch']);
        }
    }

    public function actionGet_select_yar()
    {
        if ($_POST['idBrand'] != 0) {
            if ($_POST['type'] == 1) {
                $year = BrendYear::find()->where(['id_brand' => $_POST['idBrand']])->one();
                if ($year->max_y == 9999) {
                    $yearEnd = 2015;
                } else {
                    $yearEnd = $year->max_y;
                }
                $yearAll = [];
                for ($i = $year->min_y; $i <= $yearEnd; $i++) {
                    $yearAll[$i] = $i;
                }
            } else {
                $year = CargoautoYear::find()->where(['id_brand' => $_POST['idBrand']])->one();
                $yearAll = [];
                for ($i = $year->min_y; $i <= $year->max_y; $i++) {
                    $yearAll[$i] = $i;
                }
            }
            echo Html::dropDownList('yearSearch', 0, $yearAll, ['prompt' => 'Год выпуска', 'class' => 'yearSearch',]);
        }
    }

    public function actionGet_select_brand_moto()
    {
        if ($_POST['cat'] != 0) {
            $brandMoto = CarMark::find()->where(['id_car_type' => $_POST['cat']])->orderBy('name')->all();
            echo Html::dropDownList(
                'brandMoto',
                0,
                ArrayHelper::map($brandMoto, 'id_car_mark', name),
                ['prompt' => 'Выберите марку', 'class' => 'brandAutoSearch']
            );
        }
    }

    public function actionAdd_favorites()
    {
        $favorites = new Favorites();
        if (isset($_POST['productid'])) {
            $fav = Favorites::find()->where(['market_id' => $_POST['productid'], 'user_id' => Yii::$app->user->id])->one();
            if (empty($fav)) {
                $favorites->market_id = $_POST['productid'];
                $favorites->user_id = Yii::$app->user->id;
                $favorites->save();
            } else {
                $fav->delete();
            }
        }
    }

    public function actionAdd_favorites_service()
    {
        $favorites = new Favorites();
        if (isset($_POST['productid'])) {
            $fav = Favorites::find()->where(['service_id' => $_POST['productid'], 'user_id' => Yii::$app->user->id])->one();
            if (empty($fav)) {
                $favorites->service_id = $_POST['productid'];
                $favorites->user_id = Yii::$app->user->id;
                $favorites->save();
            } else {
                $fav->delete();
            }
        }
    }

    public function actionAdd_favorites_offers()
    {
        $favorites = new Favorites();

        if (isset($_POST['productid'])) {
            $fav = Favorites::find()->where(['offers_id' => $_POST['productid'], 'user_id' => Yii::$app->user->id])->one();

            if (empty($fav)) {
                $favorites->offers_id = $_POST['productid'];
                $favorites->user_id = Yii::$app->user->id;
                $favorites->save();
            } else {
                $fav->delete();
            }
        }
    }

    public function actionView_widget()
    {
        if ($_POST['type'] == 1) {
            echo SelectAuto::widget(['view' => ($_GET['type'] == 'auto') ? '0' : '1', 'select_from_garage' => true]);
        }
        if ($_POST['type'] == 2) {
            echo InfoSplint::widget();
        }
        if ($_POST['type'] == 3) {
            echo InfoDisk::widget();
        }
    }

    public function actionUpload_file()
    {
        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {
            ProductImg::deleteAll(['product_id' => 99999, 'user_id' => Yii::$app->user->id]);
            foreach ($_FILES['file']['name'] as $file) {
                Image::watermark($_FILES['file']['tmp_name'][$i], 'http://carbax.ru/media/img/LogoBlack.png')
                    ->save($dir . $file, ['quality' => 100]);
                //move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $file);
                $img = new ProductImg();
                $img->product_id = 99999;
                $img->img = $dir . $file;
                $img->cover = 0;
                $img->user_id = Yii::$app->user->id;
                $img->save();
                $i++;
            }
        }
        echo 1;
    }

    public function actionUpload_file_offers()
    {
        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {
            OffersImages::deleteAll(['offers_id' => 99999, 'user_id' => Yii::$app->user->id]);
            foreach ($_FILES['file']['name'] as $file) {
                Image::watermark($_FILES['file']['tmp_name'][$i], 'http://carbax.ru/media/img/LogoBlack.png')
                    ->save($dir . $file, ['quality' => 100]);
                //move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $file);
                $img = new OffersImages();
                $img->offers_id = 99999;
                $img->images = $dir . $file;
                $img->user_id = Yii::$app->user->id;
                $img->save();
                $i++;
            }
        }
        echo 1;
    }

    public function actionUpload_file_services()
    {
        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {
            ServicesImg::deleteAll(['services_id' => 99999, 'user_id' => Yii::$app->user->id]);
            foreach ($_FILES['file']['name'] as $file) {
                Image::watermark($_FILES['file']['tmp_name'][$i], 'http://carbax.ru/media/img/LogoBlack.png')
                    ->save($dir . $file, ['quality' => 100]);
                //move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $file);
                $img = new ServicesImg();
                $img->services_id = 99999;
                $img->images = $dir . $file;
                $img->user_id = Yii::$app->user->id;
                $img->save();
                $i++;
            }
        }
        echo 1;
    }

    public function actionUpload_file_service()
    {
        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $i = 0;

        if (!empty($_FILES['file']['name'][0])){
                Image::watermark($_FILES['file']['tmp_name'][$i], 'http://carbax.ru/media/img/LogoBlack.png')
                ->save($dir . $_FILES['file']['name'][0], ['quality' => 100]);

      //

            //move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $_FILES['file']['name'][0]);




            $service = Services::findOne($_GET['id']);
            $service->photo = $dir . $_FILES['file']['name'][0];
            $service->save();
        }
        echo 1;
    }

    public function actionPseudo_delete_file()
    {
        ProductImg::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }

    public function actionPseudo_delete_file_service()
    {
        ServicesImg::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }

    public function actionPseudo_delete_file_offers()
    {
        OffersImages::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }

    public function actionGet_auto_params()
    {
        $drive = AwpDrive::find()->all();
        $body = AwpBodyType::find()->all();
        $typeMotor = AwpTypeMotor::find()->all();
        $trans = AwpTransmission::find()->all();
        if ($_POST['id'] == 1) {
            return $this->renderPartial('auto_params', [
                'drive' => $drive,
                'body' => $body,
                'typeMotor' => $typeMotor,
                'trans' => $trans,
            ]);
        }
        if ($_POST['id'] == 2) {
            return $this->renderPartial('auto_params');
        }
        if ($_POST['id'] == 3) {
            return $this->renderPartial('auto_params');
        }
    }

    public function actionShow_params()
    {
        //запчасти
        if ($_POST['type'] == 1) {
            echo Html::dropDownList('typeAuto', '', ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
        }
        //транспорт
        if ($_POST['type'] == 2) {
            echo Html::dropDownList('typeAuto', '', ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
        }
        //шины
        if ($_POST['type'] == 3) {
            echo $this->renderPartial('splintSearch');
        }
        //диски
        if ($_POST['type'] == 4) {
            echo $this->renderPartial('diskSearch');
        }
    }

    public function actionShow_widget_categ()
    {
        $cat = TofSearchTree::find()->where(['str_id_parent' => '10001'])->all();
        echo Html::dropDownList('categ', 0, ArrayHelper::map($cat, 'str_id', 'str_des'), ['prompt' => 'Тип запчасти', 'class' => 'categ']);
    }

    public function actionShow_offers()
    {
        $address = Address::get_geo_info();

        //Debug::prn($offers->createCommand()->rawSql);

        if($_POST['sort'] == 'news'){
            $orderBy = 'dt_add DESC';
        }
        else{
            $orderBy = 'views DESC';
        }

        if ($_POST['serviceTypeId'] == 0) {
            $offers = Offers::find()
                ->leftJoin('`offers_images`', '`offers_images`.`offers_id` = `offers`.`id`')
                ->where(['LIKE', 'region_id', $address['region_id']])
                ->andWhere(['status' => 1])
                ->orderBy($orderBy)
                ->limit(6)
                ->with('offers_images')
                ->all();
        } else {
            //$offers = Offers::find()->where(['region_id' => $address['region_id'],'service_type_id'=>$_POST['serviceTypeId']])->orderBy('dt_add DESC')->limit(9)->all();
            $offers = Offers::find()
                ->leftJoin('`offers_images`', '`offers_images`.`offers_id` = `offers`.`id`')
                ->where(['LIKE', 'region_id', $address['region_id']])
                ->andWhere(['LIKE', 'service_type_id', $_POST['serviceTypeId'] . ','])
                ->andWhere(['status' => 1])
                ->orderBy($orderBy)
                ->limit(6)
                ->with('offers_images')
                ->all();

            //Debug::prn($offers);
        }

        return $this->renderPartial('offers',
            [
                'offers' => $offers,
                'serviceTypeId' => $_POST['serviceTypeId'],
            ]);
        //Debug::prn($_POST['serviceTypeId']);
    }

    public function actionGet_service_type_id()
    {
        $srviceTypeId = Services::findOne($_POST['serviceId'])->service_type_id;
        echo $srviceTypeId;
    }

    public function actionGet_address_services()
    {
        $servicesId = explode(',', substr($_POST['servicesId'], 0, -1));
        $html = '<h3>Выберите адреса для которых будет действовать предложение</h3>';
        foreach ($servicesId as $sid) {
            $service = Services::findOne($sid);
            $address = \common\models\db\Address::find()->where(['service_id' => $sid])->all();
            $html .= $this->renderPartial('address',
                [
                    'service' => $service,
                    'address' => $address,
                ]);
        }

        //Debug::prn($html);
        return ($html);
    }

    public function actionGet_info_services()
    {
        //Debug::prn($_POST['servicesId']);
        $servicesId = explode(',', substr($_POST['servicesId'], 0, -1));
        // Debug::prn($servicesId);
        $servicesInfo = Services::find()
            ->leftJoin('`phone`', '`phone`.`service_id` = `services`.`id`')
            ->where(['`services`.`id`' => $servicesId])
            ->with('phone')
            ->all();
        return $this->renderPartial('servicesInfo', ['servicesInfo' => $servicesInfo]);
    }

    public function actionSelect_auto_garage()
    {
        echo AutoGarage::widget();
    }

    public function actionGet_auto_params_auto()
    {
        $auto = Garage::find()->where(['id' => $_POST['id']])->one();
        $autoWidget = AutoWidget::find()
            ->where(['id' => $auto['id_auto_widget']])
            ->asArray()
            ->one();
        $autoParams = AutoWidgetParams::find()
            ->where(['id_auto_widget' => $autoWidget['id']])
            ->asArray()
            ->one();


        $auto = json_encode(array(
            'autoWidget' => $autoWidget,
            'autoParams' => $autoParams,
        ));
        echo $auto;

    }

    public function actionGet_select_car()
    {
        $auto = BcbBrands::find()->orderBy('name')->all();
        echo Html::dropDownList(
            'requestMarkAuto',
            null,
            ArrayHelper::map($auto, 'id', 'name'),
            ['prompt' => 'Марка', 'class' => 'addContent__adress requestMarkAuto', 'required' => 'required']
        );
    }

    public function actionGet_select_cargo()
    {
        $auto = AutoComBrands::find()->orderBy('name')->all();
        echo Html::dropDownList(
            'requestMarkAuto',
            null,
            ArrayHelper::map($auto, 'id', 'name'),
            ['prompt' => 'Марка', 'class' => 'addContent__adress requestMarkAuto', 'required' => 'required']
        );
    }

    public function actionGet_select_moto()
    {
        $auto = CarMarkByType::find()->orderBy('name')->all();
        echo Html::dropDownList(
            'requestMarkAuto',
            null,
            ArrayHelper::map($auto, 'id_car_mark', 'name'),
            ['prompt' => 'Марка', 'class' => 'addContent__adress requestMarkAuto', 'required' => 'required']
        );
    }

    public function actionGet_model_auto()
    {
        if ($_POST['typeAuto'] == 1) {
            $auto = BcbModels::find()->where(['brand_id' => $_POST['brandId']])->orderBy('name')->all();
            echo Html::dropDownList(
                'requestModelAuto',
                null,
                ArrayHelper::map($auto, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress requestModelAuto', 'required' => 'required']
            );
        }
        if ($_POST['typeAuto'] == 2) {
            $auto = AutoComModels::find()->where(['brand_id' => $_POST['brandId']])->orderBy('name')->all();
            echo Html::dropDownList(
                'requestModelAuto',
                null,
                ArrayHelper::map($auto, 'id', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress requestModelAuto', 'required' => 'required']
            );
        }
        if ($_POST['typeAuto'] == 3) {
            $auto = CarModel::find()->where(['id_car_mark' => $_POST['brandId']])->orderBy('name')->all();
            echo Html::dropDownList(
                'requestModelAuto',
                null,
                ArrayHelper::map($auto, 'id_car_model', 'name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress requestModelAuto', 'required' => 'required']
            );
        }
    }

    public function actionGet_year_auto()
    {
        if ($_POST['typeAuto'] == 1) {
            $year = BrendYear::find()->where(['id_brand' => $_POST['brandId']])->one();
            if ($year->max_y == 9999) {
                $yearEnd = 2015;
            } else {
                $yearEnd = $year->max_y;
            }
            $yearAll = [];
            for ($i = $year->min_y; $i <= $yearEnd; $i++) {
                $yearAll[$i] = $i;
            }
            echo Html::dropDownList('requestYear', 0, $yearAll, ['prompt' => 'Год выпуска', 'class' => 'addContent__adress requestYear', 'required' => 'required']);
        }
        if ($_POST['typeAuto'] == 2) {
            $year = CargoautoYear::find()->where(['id_brand' => $_POST['brandId']])->one();
            $yearAll = [];
            for ($i = $year->min_y; $i <= $year->max_y; $i++) {
                $yearAll[$i] = $i;
            }
            echo Html::dropDownList('requestYear', 0, $yearAll, ['prompt' => 'Год выпуска', 'class' => 'addContent__adress requestYear', 'required' => 'required']);
        }
    }

    public function actionGet_auto_brand()
    {
        if ($_POST['id'] == 1) {
            $brand = BcbBrands::find()->orderBy('name')->all();
            return $this->renderPartial('brand_auto', ['brand' => $brand]);
        }

        if ($_POST['id'] == 2) {
            $brand = AutoComBrands::find()->orderBy('name')->all();
            return $this->renderPartial('brand_auto', ['brand' => $brand]);
        }

        if ($_POST['id'] == 3) {
            $brand = CarMarkByType::find()->orderBy('name')->all();
            return $this->renderPartial('moto_auto', ['brand' => $brand]);
        }
    }

    public function actionGet_attend_decison()
    {
        //$attend = new OffersAttend();
        $userId = Yii::$app->user->id;
        $decison = OffersAttend::find()
            ->where(['user_id' => $userId, 'offers_id' => $_POST['offersId']])->one();

        if (empty($decison)) {
            $attendDecison = new OffersAttend();
            $attendDecison->user_id = $userId;
            $attendDecison->offers_id = $_POST['offersId'];
            $attendDecison->decison = $_POST['decison'];
            $attendDecison->save();
        } else {
            OffersAttend::updateAll(['decison' => $_POST['decison']], ['offers_id' => $_POST['offersId'], 'user_id' => $userId]);
        }


        $decisonY = OffersAttend::find()->where(['offers_id' => $_POST['offersId'], 'decison' => '1'])->count();
        $decisonN = OffersAttend::find()->where(['offers_id' => $_POST['offersId'], 'decison' => '0'])->count();

        $decisonCount = json_encode(['decisonY' => $decisonY, 'decisonN' => $decisonN]);
        echo $decisonCount;

    }

    public function actionAdd_reviews()
    {
        $review = new Reviews();
        $review->{$_POST['spirit']} = 1;
        $review->spirit_id = $_POST['id'];
        $review->text = $_POST['text'];
        $review->user_id = Yii::$app->user->id;
        $review->rating = $_POST['raiting'];
        $review->dt_add = time();
        $review->save();
    }

    public function actionShow_favorites()
    {
        if ($_POST['type'] == 1) {
            $product = Market::find()
                ->leftJoin('`favorites`', '`favorites`.`market_id` = `market`.`id`')
                ->leftJoin('`product_img`', '`product_img`.`product_id` = `market`.`id`')
                ->leftJoin('`geobase_city`', '`geobase_city`.`id` = `market`.`city_id`')
                ->where(['`favorites`.`user_id`' => Yii::$app->user->id])
                ->with('product_img', 'geobase_city')
                ->all();
            return $this->renderPartial('favorites/market', ['product' => $product]);
        }

        if ($_POST['type'] == 2) {
            $offers = Offers::find()
                ->leftJoin('`favorites`', '`favorites`.`offers_id` = `offers`.`id`')
                ->leftJoin('`offers_images`', '`offers_images`.`offers_id` = `offers`.`id`')
                ->where(['`favorites`.`user_id`' => Yii::$app->user->id])
                ->with('offers_images')
                ->all();
            return $this->renderPartial('favorites/offers', ['offers' => $offers]);
        }

        if ($_POST['type'] == 3) {
            $services = Services::find()
                ->leftJoin('`favorites`', '`favorites`.`service_id` = `services`.`id`')
                ->leftJoin('`services_img`', '`services_img`.`services_id` = `services`.`id`')
                ->where(['`favorites`.`user_id`' => Yii::$app->user->id])
                ->with('services_img')
                ->all();

            return $this->renderPartial('favorites/services', ['services' => $services]);
        }

    }

    public function actionGet_filter_city()
    {
        $city = GeobaseCity::find()->where(['region_id' => $_POST['idReg']])->orderBy('name')->all();
        echo Html::dropDownList('filterServicesCity', '', ArrayHelper::map($city, 'id', 'name'), ['prompt' => 'Выберите город', 'class' => 'filterServicesCity']);
    }

    public function actionFiltercount()
    {

        foreach ($_POST as $key => $value) {
            if ($value == 'undefined') {
               $_POST[$key] = '';
            }
        }

        if (!empty($_POST['typeId'])) {
            $typeId = explode(',', substr($_POST['typeId'], 0, -1));
        }

        $services = Services::find()
            ->leftJoin('address', '`address`.`service_id` = `services`.`id`');

        if (isset($_POST['idReg'])) {
            $services->andFilterWhere(['`address`.`region_id`' => $_POST['idReg']]);
        }

        if (isset($_POST['idCity'])) {
            $services->andFilterWhere(['`address`.`city_id`' => $_POST['idCity']]);
        }

        if (isset($typeId)) {
            $services->andFilterWhere(['`services`.`service_type_id`' => $typeId]);
        }
        $services->groupBy('`services`.`id`');
        $count = $services->count();

        return $count;
        //Debug::prn($s);
    }

    public function actionGet_phone_user(){
        $phone = User::find()->where(['id' => Yii::$app->user->id])->one()->telephon;
        echo $phone;
    }

    public function actionGet_zone_img(){
        $img = ReclameZone::find()->where(['id' => $_POST['id']])->one()->img;
        echo "<img src='$img' width='250px' />";
    }

    public function actionGet_template_name(){
        $temp = ReclameTemplate::find()->where(['zone_id' => $_POST['id']])->all();
        echo Html::radioList('Reclame[tamplate_id]', null, ArrayHelper::map($temp,'id','title'),
            [
            'item' => function($index, $label, $name, $checked, $value) {

                $return = '<label class="modal-radio">';
                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="templateId" >';
                $return .= '<span class="radioSel">' . ucwords($label) . '</span>';
                $return .= '</label>';

                return $return;
            }]);
    }

    public function actionGet_template_view(){
        $temp = ReclameTemplate::find()->where(['id' =>$_POST['id']])->one();

        echo Parser::parse($temp->tpl,['title' => 'Заголовок','descr'=>'Описание','img'=> '<img id="blah" src="/media/img/no-img.png" />', 'info'=>$temp->recommend],false,false);
    }

    public function actionGet_budget(){
        $temp = ReclameTemplate::find()->where(['id' =>$_POST['id']])->one();
        if($_POST['typeBudget'] == 1){
            $html = "<div><span>Стоимость: </span><span class='priceReclame'>$temp->price_click</span><span> руб.</span><span> за один клик</span></div>";
        }
        if($_POST['typeBudget'] == 2){
            $html = "<div><span>Стоимость: </span><span class='priceReclame'>$temp->price_show</span><span> руб.</span><span> за 1000 показов</span></div>";
        }
        //Debug::prn()
        echo $html;
    }

}