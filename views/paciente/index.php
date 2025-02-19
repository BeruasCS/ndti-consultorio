<?php

use app\models\Paciente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PacienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paciente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome_completo',
            'data_nascimento',
            'sexo',
            'rua',
            //'numero',
            //'complemento',
            //'bairro',
            //'cidade',
            //'estado',
            //'cep',
            //'telefone_primario',
            //'telefone_secundario',
            //'email:email',
            //'cpf',
            //'nome_emergencia',
            //'contato_emergencia',
            //'id_usuario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Paciente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
