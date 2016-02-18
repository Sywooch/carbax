<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_com_modify".
 *
 * @property string $id
 * @property string $name
 * @property string $longname
 * @property integer $brand_id
 * @property integer $model_id
 * @property integer $submodel_id
 * @property string $engine_type
 * @property string $drive_type
 * @property string $release_from
 * @property integer $release_to
 * @property string $url
 * @property integer $updated
 */
class AutoComModify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_com_modify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'longname', 'engine_type', 'drive_type', 'release_from', 'url'], 'string'],
            [['brand_id', 'model_id', 'submodel_id', 'release_to', 'updated'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'longname' => 'Longname',
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'submodel_id' => 'Submodel ID',
            'engine_type' => 'Engine Type',
            'drive_type' => 'Drive Type',
            'release_from' => 'Release From',
            'release_to' => 'Release To',
            'url' => 'Url',
            'updated' => 'Updated',
        ];
    }
}
