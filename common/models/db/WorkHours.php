<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "work_hours".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $day
 * @property integer $hours_from
 * @property integer $hours_to
 * @property integer $24h
 *
 * @property Services $service
 */
class WorkHours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_hours';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id'], 'required'],
            [['service_id', 'hours_from', 'hours_to', '24h'], 'integer'],
            [['day'], 'string', 'max' => 255]
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
            'day' => 'Day',
            'hours_from' => 'Hours From',
            'hours_to' => 'Hours To',
            '24h' => '24h',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
