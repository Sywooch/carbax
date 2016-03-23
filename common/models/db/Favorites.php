<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property integer $id
 * @property integer $market_id
 * @property integer $service_id
 * @property integer $offers_id
 * @property integer $user_id
 */
class Favorites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['market_id', 'service_id', 'offers_id', 'user_id'], 'integer'],
            [['user_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'market_id' => 'Market ID',
            'service_id' => 'Service ID',
            'user_id' => 'User ID',
        ];
    }


}
