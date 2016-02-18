<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request_by_service_type".
 *
 * @property integer $id
 * @property integer $request_id
 * @property integer $service_type_id
 */
class RequestByServiceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_by_service_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'service_type_id'], 'required'],
            [['request_id', 'service_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'service_type_id' => 'Service Type ID',
        ];
    }
}
