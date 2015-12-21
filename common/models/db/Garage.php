<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "garage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $dt_add
 * @property integer $id_auto_widget
 * @property string $comments
 * @property string $title
 * @property string $vin
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
            [['user_id'], 'required'],
            [['user_id', 'dt_add','id_auto_widget'], 'integer'],
            [['comments', 'title','vin'], 'string', 'max' => 255]
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
