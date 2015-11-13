<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
 * @property integer $dt_add
 *
 * @property Services $service
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $img_url;

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
            [['service_id', 'description', 'short_description'], 'required'],
            [['service_id', 'new_price', 'old_price', 'region_id'], 'integer'],
            [['description', 'short_description'], 'string'],
            [['title', 'discount'], 'string', 'max' => 255],
            [['img_url'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'service_id' => 'Service ID',
            'img_url' => 'Img Url',
            'description' => 'Description',
            'short_description' => 'Short Description',
            'new_price' => 'New Price',
            'old_price' => 'Old Price',
            'discount' => 'Discount',
            'region_id' => 'Region ID',
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
    public function upload()
    {
        if ($this->validate()) {
            $this->img_url->saveAs('uploads/' . $this->img_url->baseName . '.' . $this->img_url->extension);
            return true;
        } else {
            return false;
        }
    }
}
