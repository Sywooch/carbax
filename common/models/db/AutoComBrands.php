<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_com_brands".
 *
 * @property string $id
 * @property string $name
 * @property string $group
 * @property string $url
 * @property integer $updated
 */
class AutoComBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_com_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'group', 'url'], 'string'],
            [['updated'], 'integer']
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
            'group' => 'Group',
            'url' => 'Url',
            'updated' => 'Updated',
        ];
    }
}
