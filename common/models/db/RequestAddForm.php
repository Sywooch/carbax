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
 * @property string $class
 * @property string $input_id
 * @property string $placeholder
 * @property string $template
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
            [['name','key','class', 'input_id', 'placeholder'], 'string', 'max' => 255],
            ['template', 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_type' => 'Тип формы',
            'key' => 'Key',
            'name' => 'Название',
            'template' => 'Шаблон',
            'placeholder' => 'Placeholder',
            'input_id' => 'Id',
            'class' => 'Класс',
        ];
    }
}
