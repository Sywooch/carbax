<?php

namespace common\models\db;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "market".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $service_id
 * @property integer $region_id
 * @property integer $city_id
 * @property string $name
 * @property string $descr
 * @property string $price
 * @property string $run
 * @property string $address
 * @property integer $dt_add
 * @property integer $prod_type
 * @property integer $id_auto_widget
 * @property integer $id_info_disk
 * @property integer $id_info_splint
 * @property integer $new
 * @property integer $published
 * @property integer $phone
 * @property string $slug
 */
class Market extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select([]);
                    $model->andWhere(['published' => 1]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to('/flea-market/view/'.$model->id .'/'.$model->slug, true),
                        'title' => $model->name,
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
        return 'market';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'region_id', 'city_id', 'name', 'descr', 'price', 'dt_add', 'phone'], 'required'],
            [['user_id', 'service_id', 'region_id', 'city_id', 'dt_add','id_auto_widget','new'], 'integer'],
            [['descr'], 'string'],
            [['name', 'price', 'phone', 'slug'], 'string', 'max' => 255]
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
            'service_id' => 'Service ID',
            'man_id' => 'Man ID',
            'type_id' => 'Type ID',
            'model_id' => 'Model ID',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'name' => 'Name',
            'descr' => 'Descr',
            'price' => 'Price',
            'dt_add' => 'Dt Add',
        ];
    }

    public function getauto_widget()
    {
        return $this->hasOne(AutoWidget::className(), ['id' => 'id_auto_widget']);
    }

    public function getgeobase_city()
    {
        return $this->hasOne(GeobaseCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getfavorites()
    {
        return $this->hasMany(Favorites::className(), ['market_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getproduct_img()
    {
        return $this->hasMany(ProductImg::className(), ['product_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getauto_widget_params()
    {
        return $this->hasMany(AutoWidgetParams::className(), ['id_auto_widget' => 'id_auto_widget' ]);
    }
}
