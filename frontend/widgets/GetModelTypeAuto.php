<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 08.01.2016
 * Time: 9:23
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use yii\base\Widget;

class GetModelTypeAuto extends Widget
{
    public $brand;
    public $year;
    public $typeAuto;
    public $model;

    public function run(){
        if($this->typeAuto == 1){

                if (empty($this->year) && !empty($this->brand)) {
                    $model = BcbModels::find()->where(['brand_id' => $this->brand])->orderBy('name')->all();
                }
                if (!empty($this->year) && !empty($this->brand)) {
                    $model = BcbModels::find()
                        ->select('`bcb_models`.`id`, `bcb_models`.`name`')
                        ->leftJoin('`bcb_modify`', '`bcb_modify`.`model_id` = `bcb_models`.`id`')
                        ->where(['brand_id' => $this->brand])
                        ->andWhere(['<=', '`bcb_modify`.`y_from`', $this->year])
                        ->andWhere(['>=', '`bcb_modify`.`y_to`', $this->year])
                        ->all();
                }

                if (!empty($this->model) && !empty($this->year)) {
                    $model = BcbModify::find()->where(['model_id' => $this->model])
                        ->andWhere(['<=', 'y_from', $this->year])
                        ->andWhere(['>=', 'y_to', $this->year])->all();
                }

                if (!empty($this->model) && empty($this->year)) {
                    $model = BcbModify::find()->where(['model_id' => $this->model])->orderBy('name')->all();
                }


        }
        if($this->typeAuto == 2){

        }
        if($this->typeAuto == 3){

        }
        //Debug::prn($this->typeAuto);
        return $this->render('model_type',['model'=>$model]);
    }


}