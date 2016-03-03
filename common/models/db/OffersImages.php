<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "offers_images".
 *
 * @property integer $id
 * @property integer $offers_id
 * @property integer $user_id
 * @property string $images
 */
class OffersImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offers_id', 'user_id', 'images'], 'required'],
            [['offers_id', 'user_id'], 'integer'],
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
            'offers_id' => 'Offers ID',
            'user_id' => 'User ID',
            'images' => 'Images',
        ];
    }
}
