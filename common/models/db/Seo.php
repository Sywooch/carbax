<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $name_page
 * @property string $name_page_key
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_page', 'name_page_key', 'meta_keywords', 'meta_description'], 'required'],
            [['name_page', 'name_page_key', 'meta_keywords', 'meta_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_page' => 'Название страницы',
            'name_page_key' => 'Key страницы',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
