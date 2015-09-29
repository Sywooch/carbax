<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "brand_cars".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ServiceBrandCars[] $serviceBrandCars
 */
class BrandCars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand_cars';
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
    public function getServiceBrandCars()
    {
        return $this->hasMany(ServiceBrandCars::className(), ['brand_cars_id' => 'id']);
    }
}
