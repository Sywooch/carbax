<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame_zone".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 */
class ReclameZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img'], 'required'],
            [['name', 'img'], 'string', 'max' => 255]
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
            'img' => 'Изображение',
        ];
    }
}
