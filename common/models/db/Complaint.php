<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "complaint".
 *
 * @property integer $id
 * @property integer $from_user
 * @property string $to_object
 * @property string $subject
 * @property integer $dt_add
 * @property integer $read_complaint
 * @property string $text
 */
class Complaint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complaint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user', 'to_object', 'subject', 'dt_add', 'read_complaint', 'text'], 'required'],
            [['from_user', 'dt_add', 'read_complaint'], 'integer'],
            [['text'], 'string'],
            [['to_object', 'subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user' => 'От кого',
            'to_object' => 'Ссылка на материал',
            'subject' => 'Тема',
            'dt_add' => 'Дата',
            'read' => 'Read',
            'text' => 'Текст',
        ];
    }
}
