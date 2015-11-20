<?php

namespace backend\modules\comfort_zone\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\comfort_zone\models\ComfortZone;

/**
 * ComfortZoneSearch represents the model behind the search form about `backend\modules\comfort_zone\models\ComfortZone`.
 */
class ComfortZoneSearch extends ComfortZone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'img_ulr'], 'safe'],
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
        $query = ComfortZone::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img_ulr', $this->img_ulr]);

        return $dataProvider;
    }
}
