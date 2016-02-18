<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "car_mark_by_type".
 *
 * @property integer $id_car_mark
 * @property string $name
 * @property integer $id_car_type
 * @property string $name_rus
 */
class CarMarkByType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_mark_by_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_car_type'], 'required'],
            [['id_car_type'], 'integer'],
            [['name', 'name_rus'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_car_mark' => 'Id Car Mark',
            'name' => 'Name',
            'id_car_type' => 'Id Car Type',
            'name_rus' => 'Name Rus',
        ];
    }
}
