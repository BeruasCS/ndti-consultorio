<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id
 * @property string $nome_completo
 * @property string $data_nascimento
 * @property string|null $sexo
 * @property string $rua
 * @property string $numero
 * @property string|null $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string $telefone_primario
 * @property string|null $telefone_secundario
 * @property string|null $email
 * @property string $cpf
 * @property string|null $nome_emergencia
 * @property string|null $contato_emergencia
 * @property int|null $id_usuario
 *
 * @property Consulta[] $consultas
 * @property Historicomedico[] $historicomedicos
 * @property Prontuario[] $prontuarios
 * @property Usuario $usuario
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $documento; // Novo atributo para upload de arquivo

    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_completo', 'data_nascimento', 'rua', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'telefone_primario', 'cpf'], 'required'],
            [['data_nascimento'], 'safe'],
            [['id_usuario'], 'integer'],
            [['nome_completo', 'email', 'nome_emergencia'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 1],
            [['rua', 'complemento'], 'string', 'max' => 255],
            [['numero'], 'string', 'max' => 10],
            [['bairro', 'cidade'], 'string', 'max' => 50],
            [['estado'], 'string', 'max' => 2],
            [['cep'], 'string', 'max' => 8],
            [['telefone_primario', 'telefone_secundario', 'contato_emergencia'], 'string', 'max' => 15],
            [['cpf'], 'string', 'max' => 11],
            [['cpf', 'email'], 'unique'],
            [['documento'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx, jpg, png'], // Validação do arquivo
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_completo' => 'Nome Completo',
            'data_nascimento' => 'Data Nascimento',
            'sexo' => 'Sexo',
            'rua' => 'Rua',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'cep' => 'Cep',
            'telefone_primario' => 'Telefone Primario',
            'telefone_secundario' => 'Telefone Secundario',
            'email' => 'Email',
            'cpf' => 'Cpf',
            'nome_emergencia' => 'Nome Emergencia',
            'contato_emergencia' => 'Contato Emergencia',
            'id_usuario' => 'Id Usuario',
            'documento' => 'Documento (PDF ou Imagem)',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::class, ['paciente_id' => 'id']);
    }

    /**
     * Gets query for [[Historicomedicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricomedicos()
    {
        return $this->hasMany(Historicomedico::class, ['paciente_id' => 'id']);
    }

    /**
     * Gets query for [[Prontuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProntuarios()
    {
        return $this->hasMany(Prontuario::class, ['paciente_id' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::class, ['id' => 'id_usuario']);
    }
}
