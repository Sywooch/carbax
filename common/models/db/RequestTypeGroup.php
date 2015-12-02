<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_type_group".
 *
 * @property integer $id
 * @property integer $request_type_id
 * @property integer $add_fields_group_id
 *
 * @property AddFieldsGroup $addFieldsGroup
 * @property RequestType $requestType
 */
class RequestTypeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_type_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_type_id', 'add_fields_group_id'], 'required'],
            [['request_type_id', 'add_fields_group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_type_id' => 'Request Type ID',
            'add_fields_group_id' => 'Add Fields Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFieldsGroup()
    {
        return $this->hasOne(AddFieldsGroup::className(), ['id' => 'add_fields_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestType()
    {
        return $this->hasOne(RequestType::className(), ['id' => 'request_type_id']);
    }
}
