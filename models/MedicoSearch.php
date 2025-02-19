<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medico;

/**
 * MedicoSearch represents the model behind the search form of `app\models\Medico`.
 */
class MedicoSearch extends Medico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario'], 'integer'],
            [['nome_completo', 'crm', 'telefone_primario', 'telefone_secundario', 'email', 'horario_atendimento'], 'safe'],
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
        $query = Medico::find();

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
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'nome_completo', $this->nome_completo])
            ->andFilterWhere(['like', 'crm', $this->crm])
            ->andFilterWhere(['like', 'telefone_primario', $this->telefone_primario])
            ->andFilterWhere(['like', 'telefone_secundario', $this->telefone_secundario])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'horario_atendimento', $this->horario_atendimento]);

        return $dataProvider;
    }
}
