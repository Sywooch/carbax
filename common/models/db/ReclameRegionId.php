<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame_region_id".
 *
 * @property integer $id
 * @property integer $reclame_id
 * @property integer $regiojn_id
 */
class ReclameRegionId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame_region_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reclame_id', 'regiojn_id'], 'required'],
            [['reclame_id', 'regiojn_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reclame_id' => 'Reclame ID',
            'regiojn_id' => 'Regiojn ID',
        ];
    }
}
