<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame_type".
 *
 * @property integer $id
 * @property string $name
 */
class ReclameType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
