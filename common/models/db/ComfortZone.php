<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "comfort_zone".
 *
 * @property integer $id
 * @property string $name
 * @property string $img_ulr
 *
 * @property ServiceComfortZone[] $serviceComfortZones
 */
class ComfortZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comfort_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'img_ulr'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'img_ulr' => 'Img Ulr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceComfortZones()
    {
        return $this->hasMany(ServiceComfortZone::className(), ['comfort_zone_id' => 'id']);
    }
}
