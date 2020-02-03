<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Alimento;

/**
 * AlimentoSearch represents the model behind the search form of `backend\models\Alimento`.
 */
class AlimentoSearch extends Alimento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Stock', 'Tipo_Alimento_id'], 'integer'],
            [['Nome_alimento'], 'safe'],
            [['Preco'], 'number'],
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
        $query = Alimento::find();

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
            'Preco' => $this->Preco,
            'Stock' => $this->Stock,
            'Tipo_Alimento_id' => $this->Tipo_Alimento_id,
        ]);

        $query->andFilterWhere(['like', 'Nome_alimento', $this->Nome_alimento]);

        return $dataProvider;
    }
}
