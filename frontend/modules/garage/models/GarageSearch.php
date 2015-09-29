<?php

namespace frontend\modules\garage\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\garage\models\Garage;

/**
 * GarageSearch represents the model behind the search form about `frontend\modules\garage\models\Garage`.
 */
class GarageSearch extends Garage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_car'], 'integer'],
            [['brand', 'models', 'year', 'dvs', 'kpp', 'dt_add'], 'safe'],
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
        $query = Garage::find();

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
            'type_car' => $this->type_car,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'models', $this->models])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'dvs', $this->dvs])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'dt_add', $this->dt_add]);

        return $dataProvider;
    }
}
