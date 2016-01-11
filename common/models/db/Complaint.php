<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "complaint".
 *
 * @property integer $id
 * @property integer $from
 * @property string $to
 * @property string $subject
 * @property integer $dt_add
 * @property integer $read
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
            [['from', 'to', 'subject', 'dt_add', 'read', 'text'], 'required'],
            [['from', 'dt_add', 'read'], 'integer'],
            [['text'], 'string'],
            [['to', 'subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'subject' => 'Subject',
            'dt_add' => 'Dt Add',
            'read' => 'Read',
            'text' => 'Text',
        ];
    }
}
