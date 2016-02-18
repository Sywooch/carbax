<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_additional_fields".
 *
 * @property integer $id
 * @property integer $request_id
 * @property integer $add_field_id
 */
class RequestAdditionalFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_additional_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'add_field_id'], 'required'],
            [['request_id', 'add_field_id'], 'integer']
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
            'add_field_id' => 'Add Field ID',
        ];
    }
}
