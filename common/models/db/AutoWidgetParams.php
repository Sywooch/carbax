<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_widget_params".
 *
 * @property integer $id
 * @property integer $id_auto_widget
 * @property integer $body_type
 * @property integer $run
 * @property integer $transmission
 * @property integer $type_motor
 * @property double $size_motor
 * @property integer $drive
 *
 * @property AutoWidget $idAutoWidget
 */
class AutoWidgetParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_widget_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_auto_widget'], 'required'],
            [['id_auto_widget', 'body_type', 'run', 'transmission', 'type_motor', 'drive'], 'integer'],
            [['size_motor'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_auto_widget' => 'Id Auto Widget',
            'body_type' => 'Body Type',
            'run' => 'Run',
            'transmission' => 'Transmission',
            'type_motor' => 'Type Motor',
            'size_motor' => 'Size Motor',
            'drive' => 'Drive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutoWidget()
    {
        return $this->hasOne(AutoWidget::className(), ['id' => 'id_auto_widget']);
    }
}
