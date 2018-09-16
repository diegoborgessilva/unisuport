<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MensagemModel;

/**
 * MensagemSearch represents the model behind the search form about `app\models\MensagemModel`.
 */
class MensagemSearch extends MensagemModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMensagem', 'id_de', 'id_para', 'time'], 'integer'],
            [['mensagem'], 'safe'],
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
        $query = MensagemModel::find();

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
            'idMensagem' => $this->idMensagem,
            'id_de' => $this->id_de,
            'id_para' => $this->id_para,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'mensagem', $this->mensagem]);

        return $dataProvider;
    }
}
