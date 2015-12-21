<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_com_submodels".
 *
 * @property string $id
 * @property string $name
 * @property integer $brand_id
 * @property integer $model_id
 * @property string $url
 * @property integer $updated
 */
class AutoComSubmodels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_com_submodels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'string'],
            [['brand_id', 'model_id', 'updated'], 'integer']
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
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'url' => 'Url',
            'updated' => 'Updated',
        ];
    }
}
