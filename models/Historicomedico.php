<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "historicomedico".
 *
 * @property int $id
 * @property string|null $historico_cirurgias
 * @property int $paciente_id
 *
 * @property Alergia[] $alergias
 * @property Doenca[] $doencas
 * @property Medicamento[] $medicamentos
 * @property Paciente $paciente
 */
class Historicomedico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     public $medicamento_nome;
     public $alergias_descricao;
     public $documento;


    public static function tableName()
    {
        return 'historicomedico';
    }

    /**
     * {@inheritdoc}
     */
  
    public function rules()
{
    return [
        [['historico_cirurgias'], 'string'],
        [['paciente_id'], 'required'],
        [['paciente_id'], 'integer'],
        [['medicamento_nome'], 'string', 'max' => 255],  // Validação para medicamento
        [['alergias_descricao'], 'string', 'max' => 255], // Permite uma string
        [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
    ];
}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'historico_cirurgias' => 'Historico Cirurgias',
            'paciente_id' => 'Paciente ID',
            'medicamento_nome' => 'Nome do Medicamento',
            'alergias_descricao' => 'Descrição da Alergia',
        ];
    }

    /**
     * Gets query for [[Alergias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlergias()
    {
        return $this->hasMany(Alergia::class, ['historico_medico_id' => 'id']);
    }

    /**
     * Gets query for [[Doencas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoencas()
    {
        return $this->hasMany(Doenca::class, ['historico_medico_id' => 'id']);
    }

    /**
     * Gets query for [[Medicamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamento::class, ['historico_medico_id' => 'id']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id' => 'paciente_id']);
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
    
        // Salvando medicamentos
        if (!empty($this->medicamento_nome)) {
            $medicamento = new Medicamento();
            $medicamento->nome_medicamento = $this->medicamento_nome;
            $medicamento->historico_medico_id = $this->id;
    
            if (!$medicamento->save()) {
                Yii::error('Erro ao salvar medicamento: ' . json_encode($medicamento->errors));
            }
        }
    
        // Salvando alergias
        if (!empty($this->alergias_descricao)) {
            // Dividindo a string de alergias em um array
            $alergias = explode(',', $this->alergias_descricao);
    
            foreach ($alergias as $descricao) {
                $descricao = trim($descricao); // Remover espaços extras
    
                $alergia = new Alergia();
                $alergia->descricao = $descricao;
                $alergia->historico_medico_id = $this->id;
    
                if (!$alergia->save()) {
                    Yii::error('Erro ao salvar alergia: ' . json_encode($alergia->errors));
                }
            }
        }
    }
    

}