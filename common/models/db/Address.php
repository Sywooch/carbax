<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $address
 * @property string $geo
 *
 * @property Services $service
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'address'], 'required'],
            [['service_id'], 'integer'],
            [['address', 'geo'], 'string', 'max' => 255]
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
            'address' => 'Address',
            'geo' => 'Geo',
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
