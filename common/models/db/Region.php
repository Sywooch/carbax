<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "region_".
 *
 * @property string $id_region
 * @property string $id_country
 * @property string $oid
 * @property string $region_name_ru
 * @property string $region_name_en
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region_';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_country', 'oid', 'region_name_en'], 'required'],
            [['id_country', 'oid'], 'integer'],
            [['region_name_ru', 'region_name_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_region' => 'Id Region',
            'id_country' => 'Id Country',
            'oid' => 'Oid',
            'region_name_ru' => 'Region Name Ru',
            'region_name_en' => 'Region Name En',
        ];
    }
}
