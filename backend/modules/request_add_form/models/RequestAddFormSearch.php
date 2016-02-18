<?php

namespace backend\modules\request_add_form\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\request_add_form\models\RequestAddForm;

/**
 * RequestAddFormSearch represents the model behind the search form about `backend\modules\request_add_form\models\RequestAddForm`.
 */
class RequestAddFormSearch extends RequestAddForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','name', 'form_type'], 'integer'],
            [['key'], 'safe'],
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
        $query = RequestAddForm::find();

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
            'name' => $this->name,
            'form_type' => $this->form_type,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}
