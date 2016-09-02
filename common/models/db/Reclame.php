<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $template_id
 * @property integer $type_id
 * @property string $images
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $dt_add
 * @property integer $reclame_zone_id
 * @property string $link
 * @property integer $type_budget
 * @property integer $overall
 * @property integer $used
 * @property integer $price
 */
class Reclame extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'type_id', 'reclame_zone_id', 'link', 'type_budget', 'overall',  'price'], 'required'],
            [['user_id', 'template_id', 'type_id', 'status', 'dt_add', 'reclame_zone_id', 'type_budget', 'overall', 'used', 'price'], 'integer'],
            [['name', 'images', 'title', 'description', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'template_id' => 'Template ID',
            'type_id' => 'Type ID',
            'images' => 'Images',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'dt_add' => 'Dt Add',
            'reclame_zone_id' => 'Reclame Zone ID',
            'link' => 'Link',
            'type_budget' => 'Type Budget',
            'overall' => 'Overall',
            'used' => 'Used',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getreclame_template()
    {
        return $this->hasOne(ReclameTemplate::className(), ['id' => 'template_id']);
    }
}
