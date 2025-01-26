<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Historicomedico $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historicomedicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="historicomedico-view">

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
            'historico_cirurgias:ntext',
            'paciente_id',
        ],
    ]) ?>

    <!-- Exibindo os medicamentos -->
    <h3>Medicamentos Utilizados</h3>
    <?php if (count($model->medicamentos) > 0): ?>
        <ul>
            <?php foreach ($model->medicamentos as $medicamento): ?>
                <li><strong>Nome:</strong> <?= Html::encode($medicamento->nome_medicamento) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Não há medicamentos registrados para este histórico médico.</p>
    <?php endif; ?>
  <!-- Exibindo as alergias -->
<h3>Alergias Registradas</h3>
<?php if (count($model->alergias) > 0): ?>
    <ul>
        <?php foreach ($model->alergias as $alergia): ?>
            <li><strong>Descrição:</strong> <?= Html::encode($alergia->descricao) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Não há alergias registradas para este histórico médico.</p>
<?php endif; ?>




</div>
