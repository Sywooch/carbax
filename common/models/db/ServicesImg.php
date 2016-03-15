<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "services_img".
 *
 * @property integer $id
 * @property integer $services_id
 * @property integer $user_id
 * @property string $images
 */
class ServicesImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['services_id', 'user_id', 'images'], 'required'],
            [['services_id', 'user_id'], 'integer'],
            [['images'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'services_id' => 'Services ID',
            'user_id' => 'User ID',
            'images' => 'Images',
        ];
    }
}
