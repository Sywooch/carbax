<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "garage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $man_id
 * @property integer $model_id
 * @property integer $type_id
 * @property integer $dt_add
 * @property string $comments
 * @property string $title
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
            [['user_id', 'man_id', 'model_id', 'type_id'], 'required'],
            [['user_id', 'man_id', 'model_id', 'type_id', 'dt_add'], 'integer'],
            [['comments', 'title'], 'string', 'max' => 255]
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
            'man_id' => 'Man ID',
            'model_id' => 'Model ID',
            'type_id' => 'Type ID',
            'dt_add' => 'Dt Add',
            'comments' => 'Comments',
            'title' => 'Title',
        ];
    }
}
