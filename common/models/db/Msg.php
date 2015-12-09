<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "msg".
 *
 * @property integer $id
 * @property string $subject
 * @property string $from_type
 * @property string $to_type
 * @property integer $from
 * @property integer $to
 * @property string $content
 * @property integer $dt_send
 * @property integer $readed
 */
class Msg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'from_type', 'to_type', 'from', 'to', 'content', 'dt_send', 'readed'], 'required'],
            [['from', 'to', 'dt_send', 'readed'], 'integer'],
            [['content'], 'string'],
            [['subject', 'from_type', 'to_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'from_type' => 'From Type',
            'to_type' => 'To Type',
            'from' => 'From',
            'to' => 'To',
            'content' => 'Content',
            'dt_send' => 'Dt Send',
            'readed' => 'Readed',
        ];
    }
}
