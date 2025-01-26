<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Usuario extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'usuario';
    }

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

    public function getAdministrador()
    {
        return $this->hasOne(Administrador::class, ['id_administrador' => 'id']);
    }

    public function getMedico()
    {
        return $this->hasOne(Medico::class, ['id_usuario' => 'id']);
    }

    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id_usuario' => 'id']);
    }

    public function getRecepcionista()
    {
        return $this->hasOne(Recepcionista::class, ['id_recepcionista' => 'id']);
    }
    // Implementação da IdentityInterface

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }
    
    // Método para gerar o hash da senha
    public function setPassword($password)
    {
        $this->senha = Yii::$app->security->generatePasswordHash($password);
    }

    // Método para validar a senha
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->senha);
    }

    // Antes de salvar um registro, verificar se a senha foi alterada
     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isAttributeChanged('senha')) {
                $this->setPassword($this->senha);
            }
            return true;
        }
        return false;
    }
}