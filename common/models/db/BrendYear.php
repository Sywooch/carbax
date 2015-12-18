<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "brend_year".
 *
 * @property integer $id
 * @property integer $id_brand
 * @property string $name
 * @property integer $min_y
 * @property integer $max_y
 */
class BrendYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brend_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_brand', 'name', 'min_y', 'max_y'], 'required'],
            [['id_brand', 'min_y', 'max_y'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_brand' => 'Id Brand',
            'name' => 'Name',
            'min_y' => 'Min Y',
            'max_y' => 'Max Y',
        ];
    }
}
