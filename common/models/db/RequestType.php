<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Request[] $requests
 * @property RequestTypeGroup[] $requestTypeGroups
 */
class RequestType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['request_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestTypeGroups()
    {
        return $this->hasMany(RequestTypeGroup::className(), ['request_type_id' => 'id']);
    }
}
