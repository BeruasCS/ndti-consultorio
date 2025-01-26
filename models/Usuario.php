<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $tipo_usuario
 * @property string|null $data_cadastro
 *
 * @property Administrador $administrador
 * @property Medico $medico
 * @property Paciente $paciente
 * @property Recepcionista $recepcionista
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'tipo_usuario'], 'required'],
            [['tipo_usuario'], 'string'],
            [['data_cadastro'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['email', 'senha'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'tipo_usuario' => 'Tipo Usuario',
            'data_cadastro' => 'Data Cadastro',
        ];
    }

    /**
     * Gets query for [[Administrador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrador()
    {
        return $this->hasOne(Administrador::class, ['id_administrador' => 'id']);
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Medico::class, ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Recepcionista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcionista()
    {
        return $this->hasOne(Recepcionista::class, ['id_recepcionista' => 'id']);
    }
}
