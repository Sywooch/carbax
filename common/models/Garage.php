<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "garage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_car
 * @property string $brand
 * @property string $models
 * @property string $year
 * @property string $dvs
 * @property string $kpp
 * @property string $dt_add
 */
class Garage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'garage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type_car', 'brand', 'models', 'year', 'dvs', 'kpp'], 'required'],
            [['user_id', 'type_car'], 'integer'],
            [['models', 'year', 'dvs', 'kpp', 'dt_add'], 'string'],
            [['brand'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type_car' => 'Type Car',
            'brand' => 'Brand',
            'models' => 'Models',
            'year' => 'Year',
            'dvs' => 'Dvs',
            'kpp' => 'Kpp',
            'dt_add' => 'Dt Add',
        ];
    }
}
