<?php

namespace backend\modules\adsmanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\adsmanager\models\Adsmanager;

/**
 * AdsmanagerSearch represents the model behind the search form about `backend\modules\adsmanager\models\Adsmanager`.
 */
class AdsmanagerSearch extends Adsmanager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'service_id', 'id_auto_widget', 'id_info_disk', 'id_info_splint', 'region_id', 'city_id', 'dt_add', 'id_auto_type', 'category_id', 'prod_type', 'views', 'new', 'run', 'published'], 'integer'],
            [['address', 'name', 'descr', 'price', 'category_id_all'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Adsmanager::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'id_auto_widget' => $this->id_auto_widget,
            'id_info_disk' => $this->id_info_disk,
            'id_info_splint' => $this->id_info_splint,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'dt_add' => $this->dt_add,
            'id_auto_type' => $this->id_auto_type,
            'category_id' => $this->category_id,
            'prod_type' => $this->prod_type,
            'views' => $this->views,
            'new' => $this->new,
            'run' => $this->run,
            'published' => $this->published,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'descr', $this->descr])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'category_id_all', $this->category_id_all])
            ->orderBy('dt_add DESC');;

        return $dataProvider;
    }
}
