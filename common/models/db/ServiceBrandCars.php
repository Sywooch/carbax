<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_brand_cars".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $brand_cars_id
 * @property integer $type
 *
 * @property Services $service
 * @property BrandCars $brandCars
 */
class ServiceBrandCars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_brand_cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'brand_cars_id'], 'required'],
            [['service_id', 'brand_cars_id','type'], 'integer']
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
            'brand_cars_id' => 'Brand Cars ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrandCars()
    {
        return $this->hasOne(BrandCars::className(), ['id' => 'brand_cars_id']);
    }
}
