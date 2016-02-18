<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_comfort_zone".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $comfort_zone_id
 *
 * @property ComfortZone $comfortZone
 * @property Services $service
 */
class ServiceComfortZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_comfort_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'comfort_zone_id'], 'required'],
            [['service_id', 'comfort_zone_id'], 'integer']
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
            'comfort_zone_id' => 'Comfort Zone ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComfortZone()
    {
        return $this->hasOne(ComfortZone::className(), ['id' => 'comfort_zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
