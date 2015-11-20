<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_auto_type".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $auto_type_id
 *
 * @property AutoType $autoType
 * @property Services $service
 */
class ServiceAutoType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_auto_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'auto_type_id'], 'required'],
            [['service_id', 'auto_type_id'], 'integer']
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
            'auto_type_id' => 'Auto Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoType()
    {
        return $this->hasOne(AutoType::className(), ['id' => 'auto_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
