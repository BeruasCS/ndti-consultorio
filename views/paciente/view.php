<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Paciente $model */

$this->title = $model->nome_completo; // Exibindo o nome completo no título
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome_completo',
            'data_nascimento:date', // Exibindo a data no formato padrão
            'sexo',
            'rua',
            'numero',
            'complemento',
            'bairro',
            'cidade',
            'estado',
            'cep',
            'telefone_primario',
            'telefone_secundario',
            'email:email',
            'cpf',
            'nome_emergencia',
            'contato_emergencia',
            'id_usuario',
            [
                'attribute' => 'documento',
                'format' => 'raw',
                'value' => $model->documento 
                    ? Html::a(
                        'Baixar Documento', // Texto do link
                        Yii::getAlias('@web') . '/' . $model->documento, // Caminho completo para o documento
                        ['target' => '_blank', 'class' => 'btn btn-link'] // Configurações do link
                    ) 
                    : '<span style="color: red;">Nenhum documento enviado</span>', // Mensagem de erro estilizada
            ],
        ],
    ]) ?>

</div>
