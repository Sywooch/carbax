<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "service_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $view_widget_auto_type
 *
 * @property ServiceTypeGroup[] $serviceTypeGroups
 * @property Services[] $services
 */
class ServiceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['view_widget_auto_type'], 'integer'],
            [['icon'], 'safe']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceTypeGroups()
    {
        return $this->hasMany(ServiceTypeGroup::className(), ['service_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['service_type_id' => 'id']);
    }

    /**
     * Текст текст
     * @return bool
     * @param string
     */
    public function test($str){

    }
}
