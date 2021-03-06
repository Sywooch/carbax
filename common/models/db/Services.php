<?php

namespace common\models\db;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property integer $service_type_id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $description
 * @property string $website
 * @property string $photo
 * @property integer $dt_add
 * @property integer $slug
 *
 * @property Address[] $addresses
 * @property Offers[] $offers
 * @property Phone[] $phones
 * @property ServiceAddFields[] $serviceAddFields
 * @property ServiceAutoType[] $serviceAutoTypes
 * @property ServiceBrandCars[] $serviceBrandCars
 * @property ServiceClientType[] $serviceClientTypes
 * @property ServiceComfortZone[] $serviceComfortZones
 * @property ServiceType $serviceType
 * @property User $user
 * @property WorkHours[] $workHours
 */
class Services extends \yii\db\ActiveRecord
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
                    //$model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to('/view-service/'.$model->id .'/'.$model->slug, true),
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
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_type_id', 'user_id', 'email', 'description'], 'required'],
            [['service_type_id', 'user_id', 'dt_add'], 'integer'],
            [['description'], 'string'],
            [['email', 'website', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_type_id' => 'Service Type ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'email' => 'Email',
            'description' => 'Description',
            'website' => 'Website',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasMany(Address::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offers::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAddFields()
    {
        return $this->hasMany(ServiceAddFields::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getservice_add_fields()
    {
        return $this->hasMany(ServiceAddFields::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAutoTypes()
    {
        return $this->hasMany(ServiceAutoType::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceBrandCars()
    {
        return $this->hasMany(ServiceBrandCars::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getservice_brand_cars()
    {
        return $this->hasMany(ServiceBrandCars::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getphone()
    {
        return $this->hasMany(Phone::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceClientTypes()
    {
        return $this->hasMany(ServiceClientType::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceComfortZones()
    {
        return $this->hasMany(ServiceComfortZone::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceType()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'service_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkHours()
    {
        return $this->hasMany(WorkHours::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getwork_hours()
    {
        return $this->hasMany(WorkHours::className(), ['service_id' => 'id']);
    }

    public static function getNameTypeServicec($id){
        return ServiceType::findOne($id)->name;
    }

    public function getservice_comfort_zone()
    {
        return $this->hasMany(ServiceComfortZone::className(), ['service_id' => 'id']);
    }

    public function getservices_img()
    {
        return $this->hasOne(ServicesImg::className(), ['services_id' => 'id']);
    }

    public function getservice_type()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'service_type_id']);
    }
}
