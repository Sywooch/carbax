<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $img_url
 * @property string $description
 * @property string $short_description
 * @property integer $views
 * @property integer $dt_add
 * @property integer $cat_id
 * @property string $meta_keywords
 * @property string $meta_description
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','description'], 'required'],
            [['user_id', 'dt_add', 'views','cat_id'], 'integer'],
            [['description', 'short_description'], 'string'],
            [['title', 'img_url','meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['title'], 'unique']
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
            'title' => 'Заголовок',
            'img_url' => 'Путь к изображению',
            'description' => 'Новость',
            'short_description' => 'Превью новости',
            'dt_add' => 'Дата добавления',
            'views' => 'Просмотры',
            'meta_keywords' => 'Meta keywords',
            'meta_description' => 'Meta description',
        ];
    }

    public function getcategory_news()
    {
        return $this->hasOne(CategoryNews::className(), ['id' => 'cat_id']);
    }

}
