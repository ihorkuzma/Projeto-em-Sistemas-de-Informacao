<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `frontend\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Telemovel'], 'integer'],
            [['Nome', 'Email', 'Morada', ], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Cliente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'Telemovel' => $this->Telemovel,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            //->andFilterWhere(['like', 'Email', $this->Email])
            //->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Morada', $this->Morada]);
            //->andFilterWhere(['like', 'Cartao_pagamento', $this->Cartao_pagamento]);

        return $dataProvider;
    }
}
