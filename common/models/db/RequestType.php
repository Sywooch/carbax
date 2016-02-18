<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property integer $view_widget_auto
 * @property integer $view_category_auto
 * @property integer $view_mark_auto
 *
 * @property Request[] $requests
 * @property RequestTypeGroup[] $requestTypeGroups
 */
class RequestType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name','icon'], 'string', 'max' => 255],
            [['view_widget_auto','view_category_auto','view_mark_auto'],'integer']
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
            'view_widget_auto' => 'view_widget_auto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['request_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestTypeGroups()
    {
        return $this->hasMany(RequestTypeGroup::className(), ['request_type_id' => 'id']);
    }
}
