<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "info_splint".
 *
 * @property integer $id
 * @property integer $diameter
 * @property integer $seasonality
 * @property string $seasonality_name
 * @property integer $section_width
 * @property integer $section_height
 */
class InfoSplint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_splint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diameter', 'seasonality', 'seasonality_name', 'section_width', 'section_height'], 'required'],
            [['diameter', 'seasonality', 'section_width', 'section_height'], 'integer'],
            [['seasonality_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diameter' => 'Diameter',
            'seasonality' => 'Seasonality',
            'seasonality_name' => 'Seasonality Name',
            'section_width' => 'Section Width',
            'section_height' => 'Section Height',
        ];
    }
}
