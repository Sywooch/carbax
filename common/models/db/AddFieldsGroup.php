<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "add_fields_group".
 *
 * @property integer $id
 * @property string $name
 *
 * @property AdditionalFields[] $additionalFields
 * @property RequestTypeGroup[] $requestTypeGroups
 * @property ServiceTypeGroup[] $serviceTypeGroups
 */
class AddFieldsGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'add_fields_group';
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdditionalFields()
    {
        return $this->hasMany(AdditionalFields::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestTypeGroups()
    {
        return $this->hasMany(RequestTypeGroup::className(), ['add_fields_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceTypeGroups()
    {
        return $this->hasMany(ServiceTypeGroup::className(), ['add_fields_group_id' => 'id']);
    }
}
