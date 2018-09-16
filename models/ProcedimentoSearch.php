<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProcedimentoModel;

/**
 * ProcedimentoSearch represents the model behind the search form about `app\models\ProcedimentoModel`.
 */
class ProcedimentoSearch extends ProcedimentoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProcedimento', 'status'], 'integer'],
            [['titulo', 'descricao', 'categoria'], 'safe'],
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
        $query = ProcedimentoModel::find();

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
            'idProcedimento' => $this->idProcedimento,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'categoria', $this->categoria]);

        return $dataProvider;
    }
}
