<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "auto_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $img_url
 *
 * @property ServiceAutoType[] $serviceAutoTypes
 */
class AutoType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'img_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img_url' => 'Img Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAutoTypes()
    {
        return $this->hasMany(ServiceAutoType::className(), ['auto_type_id' => 'id']);
    }
}
