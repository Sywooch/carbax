<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 20.11.2015
 * Time: 12:32
 */

namespace backend\modules\category_news\widgets;


use common\classes\Debug;
use common\models\db\CategoryNews;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class CategoryTreeSelect extends Widget
{
    public $selectId;
    public $selectName = 'selNmae';

    public function run(){

       echo Html::dropDownList($this->selectName,$this->selectId,$this->get_tree(0,[]),['class'=>'form-control','prompt'=>'Родительская категория']);
    }

    public function get_tree($id,$array,$lavel=''){
        $parentCat = CategoryNews::find()->where(['parent_id'=>$id])->all();
        $lavel .= '-';
        foreach ($parentCat as $cat) {
            $array[$cat->id] = $lavel.$cat->name;
            $array = $this->get_tree($cat->id, $array, $lavel);
        }
        return $array;

    }
}