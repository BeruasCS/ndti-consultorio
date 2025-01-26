<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Paciente $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome_completo',
            'data_nascimento',
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
        ],
    ]) ?>

</div>
