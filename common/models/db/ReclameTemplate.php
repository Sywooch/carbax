<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reclame_template".
 *
 * @property integer $id
 * @property string $title
 * @property string $tpl
 * @property integer $zone_id
 * @property string $recommend
 * @property integer $price_click
 * @property integer $price_show
 */
class ReclameTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclame_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'tpl', 'zone_id', 'price_click', 'price_show'], 'required'],
            [['zone_id', 'price_click', 'price_show'], 'integer'],
            [['title', 'tpl', 'recommend'], 'string', 'max' => 255],
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
            'tpl' => 'Tpl',
            'zone_id' => 'Zone ID',
            'recommend' => 'Recommend',
            'price_click' => 'Price Click',
            'price_show' => 'Price Show',
        ];
    }
}
