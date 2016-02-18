<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "info_disk".
 *
 * @property integer $id
 * @property integer $type_disk
 * @property string $type_disk_name
 * @property integer $diameter
 * @property double $rim_width
 * @property integer $number_holes
 * @property integer $diameter_holest
 * @property double $sortie
 */
class InfoDisk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_disk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_disk', 'diameter', 'number_holes'], 'integer'],
            [['diameter_holest','rim_width', 'sortie'], 'number'],
            [['type_disk_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_disk' => 'Type Disk',
            'type_disk_name' => 'Type Disk Name',
            'diameter' => 'Diameter',
            'rim_width' => 'Rim Width',
            'number_holes' => 'Number Holes',
            'diameter_holest' => 'Diameter Holest',
            'sortie' => 'Sortie',
        ];
    }
}
