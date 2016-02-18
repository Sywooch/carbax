<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "bcb_models".
 *
 * @property integer $id
 * @property string $name
 * @property string $brand_id
 * @property integer $item_type
 * @property string $version
 */
class BcbModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcb_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['brand_id', 'item_type', 'version'], 'integer']
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
            'item_type' => 'Item Type',
            'version' => 'Version',
        ];
    }

    public function getbcb_modify()
    {
        return $this->hasMany(BcbModify::className(), ['model_id' => 'id']);
    }
}
