<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paciente;

/**
 * PacienteSearch represents the model behind the search form of `app\models\Paciente`.
 */
class PacienteSearch extends Paciente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario'], 'integer'],
            [['nome_completo', 'data_nascimento', 'sexo', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'telefone_primario', 'telefone_secundario', 'email', 'cpf', 'nome_emergencia', 'contato_emergencia'], 'safe'],
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
        $query = Paciente::find();

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
            'data_nascimento' => $this->data_nascimento,
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'nome_completo', $this->nome_completo])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'rua', $this->rua])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'complemento', $this->complemento])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'telefone_primario', $this->telefone_primario])
            ->andFilterWhere(['like', 'telefone_secundario', $this->telefone_secundario])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'nome_emergencia', $this->nome_emergencia])
            ->andFilterWhere(['like', 'contato_emergencia', $this->contato_emergencia]);

        return $dataProvider;
    }
}
