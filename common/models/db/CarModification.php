<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "car_modification".
 *
 * @property integer $id_car_modification
 * @property integer $id_car_serie
 * @property integer $id_car_model
 * @property string $name
 * @property integer $id_car_type
 * @property integer $price_min
 * @property integer $price_max
 */
class CarModification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_modification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_car_serie', 'id_car_model', 'name', 'id_car_type'], 'required'],
            [['id_car_serie', 'id_car_model', 'id_car_type', 'price_min', 'price_max'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_car_modification' => 'Id Car Modification',
            'id_car_serie' => 'Id Car Serie',
            'id_car_model' => 'Id Car Model',
            'name' => 'Name',
            'id_car_type' => 'Id Car Type',
            'price_min' => 'Price Min',
            'price_max' => 'Price Max',
        ];
    }
}
