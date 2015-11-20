<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "additional_fields".
 *
 * @property integer $id
 * @property string $name
 * @property integer $group_id
 *
 * @property AddFieldsGroup $group
 * @property RequestAddFields[] $requestAddFields
 * @property ServiceAddFields[] $serviceAddFields
 */
class AdditionalFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'additional_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'group_id'], 'required'],
            [['group_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
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
            'group_id' => 'Группа услуг',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AddFieldsGroup::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestAddFields()
    {
        return $this->hasMany(RequestAddFields::className(), ['add_fields_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAddFields()
    {
        return $this->hasMany(ServiceAddFields::className(), ['add_fields_id' => 'id']);
    }
}
