<?php

namespace backend\modules\offers\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\offers\models\OffersModels;

/**
 * OffersModelsSearch represents the model behind the search form about `backend\modules\offers\models\OffersModels`.
 */
class OffersModelsSearch extends OffersModels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'service_id', 'new_price', 'old_price', 'dt_add', 'user_id', 'status'], 'integer'],
            [['title', 'img_url', 'description', 'discount', 'region_id', 'city_id', 'service_type_id', 'address_selected', 'dt_start', 'dt_end', 'service_id_str', 'circs'], 'safe'],
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
        $query = OffersModels::find();

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
            'service_id' => $this->service_id,
            'new_price' => $this->new_price,
            'old_price' => $this->old_price,
            'dt_add' => $this->dt_add,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img_url', $this->img_url])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'region_id', $this->region_id])
            ->andFilterWhere(['like', 'city_id', $this->city_id])
            ->andFilterWhere(['like', 'service_type_id', $this->service_type_id])
            ->andFilterWhere(['like', 'address_selected', $this->address_selected])
            ->andFilterWhere(['like', 'dt_start', $this->dt_start])
            ->andFilterWhere(['like', 'dt_end', $this->dt_end])
            ->andFilterWhere(['like', 'service_id_str', $this->service_id_str])
            ->andFilterWhere(['like', 'circs', $this->circs]);

        return $dataProvider;
    }
}
