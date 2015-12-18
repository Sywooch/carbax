<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "bcb_brands".
 *
 * @property integer $id
 * @property string $name
 * @property integer $item_type
 * @property string $version
 */
class BcbBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcb_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['item_type', 'version'], 'integer']
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
            'item_type' => 'Item Type',
            'version' => 'Version',
        ];
    }
}
