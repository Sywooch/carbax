<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_add_form".
 *
 * @property integer $id
 * @property integer $request_type_id
 * @property integer $form_type
 * @property string $key
 */
class RequestAddForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_add_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','form_type', 'key'], 'required'],
            [['form_type'], 'integer'],
            [['name','key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_type' => 'Form Type',
            'key' => 'Key',
        ];
    }
}
