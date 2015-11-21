<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "product_img".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $img
 */
class ProductImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'img'], 'required'],
            [['product_id'], 'integer'],
            [['img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'img' => 'Img',
        ];
    }
}
