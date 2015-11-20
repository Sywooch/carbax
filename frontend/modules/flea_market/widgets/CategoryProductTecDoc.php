<?php
namespace frontend\modules\flea_market\widgets;

use common\models\db\CategoriesAuto;
use common\models\db\TofSearchTree;
use yii\base\Widget;

class CategoryProductTecDoc extends Widget
{

    public function run(){
        /*$searchTree = TofSearchTree::find()->where(['str_id_parent'=>'10001'])->all();*/
        $autotype = CategoriesAuto::find()->all();
        return $this->render('category_tec_doc', ['autotype' => $autotype]);
    }

}