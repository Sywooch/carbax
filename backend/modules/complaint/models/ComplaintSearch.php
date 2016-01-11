<?php

namespace backend\modules\complaint\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\complaint\models\Complaint;

/**
 * ComplaintSearch represents the model behind the search form about `backend\modules\complaint\models\Complaint`.
 */
class ComplaintSearch extends Complaint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_user', 'dt_add', 'read_complaint'], 'integer'],
            [['to_object', 'subject', 'text'], 'safe'],
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
        $query = Complaint::find();

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
            'from_user' => $this->from_user,
            'dt_add' => $this->dt_add,
            'read_complaint' => $this->read_complaint,
        ]);

        $query->andFilterWhere(['like', 'to_object', $this->to_object])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'text', $this->text])
            ->orderBy('dt_add DESC');

        return $dataProvider;
    }
}
