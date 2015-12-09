<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $request_type_id
 *
 * @property RequestType $requestType
 * @property RequestAddFields[] $requestAddFields
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_type_id'], 'required'],
            [['request_type_id'], 'integer']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestType()
    {
        return $this->hasOne(RequestType::className(), ['id' => 'request_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestAddFields()
    {
        return $this->hasMany(RequestAddFields::className(), ['request_id' => 'id']);
    }
}
