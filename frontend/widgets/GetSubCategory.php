<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 19.11.2015
 * Time: 14:54
 */

namespace frontend\widgets;


use common\models\db\TofSearchTree;
use yii\base\Widget;

class GetSubCategory extends Widget
{

    public $parentId;

    public function run(){
        $cat = TofSearchTree::find()->where(['str_id_parent' => $this->parentId])->all();
        return $this->render('sub_cat', ['cat'=>$cat]);
    }

}