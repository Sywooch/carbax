<?php

namespace common\models\db;

use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

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
 * @property string $slug
 */
class News extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select([]);
                    //$model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to('/news/'.$model->id .'-'.$model->slug, true),
                        'title' => $model->title,
                        'lastmod' => $model->dt_add,
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    ];
                }
            ],
        ];
    }

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
            [['title', 'img_url','meta_keywords', 'meta_description', 'slug'], 'string', 'max' => 255],
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
