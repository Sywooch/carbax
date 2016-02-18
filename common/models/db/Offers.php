<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $title
 * @property integer $service_id
 * @property string $img_url
 * @property string $description
 * @property string $short_description
 * @property integer $new_price
 * @property integer $old_price
 * @property string $discount
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $dt_add
 * @property integer $service_type_id
 * @property integer $user_id
 *
 * @property Services $service
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','service_id', 'description', 'short_description'], 'required'],
            [['service_id', 'new_price', 'old_price', 'region_id', 'city_id', 'dt_add','service_type_id'], 'integer'],
            [['description', 'short_description'], 'string'],
            [['title', 'img_url', 'discount'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'service_id' => 'Сервис',
            'img_url' => 'Изображение',
            'description' => 'Описание',
            'short_description' => 'Короткое описание',
            'new_price' => 'Новая цена, руб',
            'old_price' => 'Старая цена, руб',
            'discount' => 'Скидка, %',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'dt_add' => 'Dt Add',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
