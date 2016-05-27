<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame_template".
 *
 * @property integer $id
 * @property string $title
 * @property string $tpl
 * @property integer $zone_id
 */
class ReclameTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'tpl', 'zone_id'], 'required'],
            [['zone_id'], 'integer'],
            [['title', 'tpl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'tpl' => 'Tpl',
            'zone_id' => 'Zone ID',
        ];
    }
}
