<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 19.11.2015
 * Time: 14:54
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\TofSearchTree;
use yii\base\Widget;

class GetSubCategory extends Widget
{

    public $parentId;

    public function run(){
        $cat = TofSearchTree::find()->where(['str_id_parent' => $this->parentId])->all();
        $arr = $this->getAllParents($this->parentId, []);
        ksort($arr);
        return $this->render('sub_cat', ['cat'=>$cat, 'catPath'=>$arr]);
    }

    public function getAllParents($id, $arr){
        $cat = TofSearchTree::find()->where(['str_id' => $id])->one();
        $arr[$cat['str_id']] = $cat['str_des'];
        if($cat['str_id_parent'] != '10001'){
            $arr = $this->getAllParents($cat['str_id_parent'], $arr);
        }
        return $arr;
    }

}