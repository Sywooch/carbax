<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_add_fields".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $add_fields_id
 *
 * @property AdditionalFields $addFields
 * @property Services $service
 */
class ServiceAddFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_add_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'add_fields_id'], 'required'],
            [['service_id', 'add_fields_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'add_fields_id' => 'Add Fields ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFields()
    {
        return $this->hasOne(AdditionalFields::className(), ['id' => 'add_fields_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
