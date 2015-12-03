<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_type_add_form".
 *
 * @property integer $id
 * @property integer $request_type_id
 * @property integer $form_type
 */
class RequestTypeAddForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_type_add_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_type_id', 'add_form_id'], 'required'],
            [['request_type_id', 'add_form_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_type_id' => 'Request Type ID',
            'add_form_id' => 'Form Type',
        ];
    }
}
