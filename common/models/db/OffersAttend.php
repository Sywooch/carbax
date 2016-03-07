<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "offers_attend".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $offers_id
 * @property integer $decison
 */
class OffersAttend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers_attend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'offers_id', 'decison'], 'required'],
            [['user_id', 'offers_id', 'decison'], 'integer']
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
            'offers_id' => 'Offers ID',
            'decison' => 'Decison',
        ];
    }
}
