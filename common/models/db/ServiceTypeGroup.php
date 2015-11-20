<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_type_group".
 *
 * @property integer $id
 * @property integer $service_type_id
 * @property integer $add_fields_group_id
 *
 * @property ServiceType $serviceType
 * @property AddFieldsGroup $addFieldsGroup
 */
class ServiceTypeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_type_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_type_id', 'add_fields_group_id'], 'required'],
            [['service_type_id', 'add_fields_group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_type_id' => 'Service Type ID',
            'add_fields_group_id' => 'Add Fields Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceType()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'service_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFieldsGroup()
    {
        return $this->hasOne(AddFieldsGroup::className(), ['id' => 'add_fields_group_id']);
    }
}
