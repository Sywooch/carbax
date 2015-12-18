<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "bcb_modify".
 *
 * @property integer $id
 * @property string $name
 * @property string $model_id
 * @property string $version_id
 * @property string $y_from
 * @property string $y_to
 * @property integer $item_type
 * @property string $version
 */
class BcbModify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcb_modify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['model_id', 'version_id', 'y_from', 'y_to', 'item_type', 'version'], 'integer']
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
            'model_id' => 'Model ID',
            'version_id' => 'Version ID',
            'y_from' => 'Y From',
            'y_to' => 'Y To',
            'item_type' => 'Item Type',
            'version' => 'Version',
        ];
    }
}
