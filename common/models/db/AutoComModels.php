<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_com_models".
 *
 * @property string $id
 * @property string $name
 * @property integer $brand_id
 * @property string $url
 * @property integer $updated
 */
class AutoComModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_com_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'string'],
            [['brand_id', 'updated'], 'integer']
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
            'url' => 'Url',
            'updated' => 'Updated',
        ];
    }
}
