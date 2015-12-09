<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_add_field_value".
 *
 * @property integer $id
 * @property integer $request_id
 * @property string $key
 * @property string $value
 */
class RequestAddFieldValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_add_field_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'key', 'value'], 'required'],
            [['request_id'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }
}
