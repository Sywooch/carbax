<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property integer $service
 * @property integer $flea_market
 * @property integer $offers
 * @property integer $spirit_id
 * @property string $text
 * @property integer $dt_add
 * @property integer $user_id
 * @property integer $rating
 * @property integer $publ
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service', 'flea_market', 'offers', 'spirit_id', 'dt_add', 'user_id', 'rating', 'publ'], 'integer'],
            [['spirit_id', 'text', 'dt_add', 'user_id', 'rating'], 'required'],
            [['text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service' => 'Service',
            'flea_market' => 'Flea Market',
            'offers' => 'Offers',
            'spirit_id' => 'Spirit ID',
            'text' => 'Text',
            'dt_add' => 'Dt Add',
            'user_id' => 'User ID',
            'rating' => 'Rating',
            'publ' => 'Publ',
        ];
    }

    public function getuser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
