<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "car_model".
 *
 * @property integer $id_car_model
 * @property integer $id_car_mark
 * @property string $name
 * @property integer $id_car_type
 * @property string $name_rus
 * @property integer $is_error_ignore
 */
class CarModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_car_mark', 'name', 'id_car_type'], 'required'],
            [['id_car_mark', 'id_car_type', 'is_error_ignore'], 'integer'],
            [['name', 'name_rus'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_car_model' => 'Id Car Model',
            'id_car_mark' => 'Id Car Mark',
            'name' => 'Name',
            'id_car_type' => 'Id Car Type',
            'name_rus' => 'Name Rus',
            'is_error_ignore' => 'Is Error Ignore',
        ];
    }
}
