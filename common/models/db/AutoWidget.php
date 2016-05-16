<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_widget".
 *
 * @property integer $id
 * @property integer $auto_type
 * @property integer $year
 * @property integer $brand_id
 * @property string $brand_name
 * @property integer $model_id
 * @property string $model_name
 * @property integer $type_id
 * @property string $type_name
 * @property integer $submodel_id
 * @property integer $moto_type
 * @property string $submodel_name
 * @property string $photo
 */
class AutoWidget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auto_type', 'brand_id', 'brand_name', 'model_id', 'model_name'], 'required'],
            [['auto_type', 'brand_id', 'model_id', 'type_id', 'submodel_id'], 'integer'],
            [['brand_name', 'model_name', 'type_name', 'submodel_name','photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auto_type' => 'Auto Type',
            'year' => 'Year',
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
            'model_id' => 'Model ID',
            'model_name' => 'Model Name',
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'submodel_id' => 'Submodel ID',
            'submodel_name' => 'Submodel Name',
        ];
    }
}
