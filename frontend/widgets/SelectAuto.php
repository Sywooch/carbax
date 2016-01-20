<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 11:35
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\CarType;
use common\models\db\TofManufacturers;
use common\models\db\TofSearchTree;
use yii\base\Widget;

class SelectAuto extends Widget
{
    public $view = '1';
    public $auto = false;
    public $category = false;
    public $select_from_garage = false;
    public $paramsDrive = false;

    public function run(){

        if($this->auto){
            if($this->auto->auto_type == '1'){
                $brand = BcbBrands::find()->all();
                $year = BrendYear::find()->where(['id_brand'=>$this->auto->brand_id])->one();
                if($year->max_y == 9999){
                    $yearEnd = 2015;
                }
                else{
                    $yearEnd = $year->max_y;
                }
                $yearAll = [];
                for($i=$year->min_y; $i <= $yearEnd; $i++){
                    $yearAll[$i] = $i;
                }
                //$yearAll = array_reverse($yearAll);
                $model = BcbModels::find()
                    ->select('`bcb_models`.`id`, `bcb_models`.`name`')
                    ->leftJoin('`bcb_modify`','`bcb_modify`.`model_id` = `bcb_models`.`id`')
                    ->where(['brand_id' => $this->auto->brand_id])
                    ->andWhere(['<=','`bcb_modify`.`y_from`',$this->auto->year])
                    ->andWhere(['>=','`bcb_modify`.`y_to`',$this->auto->year])
                    ->all();

                $subModel = '';

                $typ = BcbModify::find()->where(['model_id'=>$this->auto->model_id])
                    ->andWhere(['<=','y_from',$this->auto->year])
                    ->andWhere(['>=','y_to',$this->auto->year])->all();

            }
            if($this->auto->auto_type == '2') {
                $brand = AutoComBrands::find()->all();
                $year = CargoautoYear::find()->where(['id_brand'=>$this->auto->brand_id])->one();
                $yearAll = [];
                for($i=$year->min_y; $i<=$year->max_y; $i++){
                    $yearAll[$i] = $i;
                }
                $model = AutoComModels::find()
                    ->select('`auto_com_models`.`id`, `auto_com_models`.`name`')
                    ->leftJoin('`auto_com_modify`','`auto_com_modify`.`model_id` = `auto_com_models`.`id`')
                    ->where(['`auto_com_models`.`brand_id`' => $this->auto->brand_id])
                    ->andWhere(['<=','`auto_com_modify`.`release_from`',$this->auto->year])
                    ->andWhere(['>=','`auto_com_modify`.`release_to`',$this->auto->year])
                    ->all();

                $subModel = AutoComSubmodels::find()
                    ->select('`auto_com_submodels`.`id`,`auto_com_submodels`.`name`')
                    ->leftJoin('`auto_com_modify`','`auto_com_modify`.`submodel_id` = `auto_com_submodels`.`id`')
                    ->where(['`auto_com_modify`.`model_id`' => $this->auto->model_id])
                    ->andWhere(['<=','`auto_com_modify`.`release_from`',$this->auto->year])
                    ->andWhere(['>=','`auto_com_modify`.`release_to`',$this->auto->year])
                    ->all();

                $typ =  AutoComModify::find()
                    ->where(['submodel_id'=>$this->auto->submodel_id])
                    ->andWhere(['<=','`release_from`',$this->auto->year])
                    ->andWhere(['>=','`release_to`',$this->auto->year])
                    ->all();
            }

            if($this->auto->auto_type == '3'){
                $typeMotoAll = CarType::find()->all();
                //$typeMoto = CarMark::find()->where(['id_car_mark' => $this->auto->brand_id])->one()->id_car_type;
                $brand = CarMark::find()->where(['id_car_type' => $this->auto->moto_type])->orderBy('name')->all();
                $model = CarModel::find()->where(['id_car_mark'=>$this->auto->brand_id])->all();
                $typ = CarModification::find()->where(['id_car_model'=>$this->auto->model_id])->all();
            }

            if($this->category && $this->view == '1'){
                $cat = explode(',', $this->category);
                $mainCat = TofSearchTree::find()->where(['str_id_parent' => 10001])->all();
            }
            else {
                $cat = false;
                $mainCat = false;
            }
            return $this->render('select_auto_edit', [
                'view'=>$this->view,
                'auto' => $this->auto,
                'brand' => $brand,
                'model' => $model,
                'year' => $yearAll,
                'sub_model' => $subModel,
                'typ' => $typ,
                'cat' => $cat,
                'main_cat' => $mainCat,
                'typeMotoAll' => $typeMotoAll,
                //'typeMoto' => $typeMoto,
            ]);
        }
        else {

            return $this->render('select_auto', [
                'select_from_garage' => $this->select_from_garage,
                'view'=>$this->view,
            ]);
        }
    }
}