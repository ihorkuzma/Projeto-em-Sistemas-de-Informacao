<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vendas;

/**
 * VendasSearch represents the model behind the search form of `backend\models\Vendas`.
 */
class VendasSearch extends Vendas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Cliente_id', 'Tipo_venda_id', 'id_mesa'], 'integer'],
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
        $query = Vendas::find();

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
            'Cliente_id' => $this->Cliente_id,
            'Tipo_venda_id' => $this->Tipo_venda_id,
            'id_mesa' => $this->id_mesa,
        ]);

        return $dataProvider;
    }
}
