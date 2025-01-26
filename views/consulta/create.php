<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Consulta $model */
 /** @var array $pacientes */
  /** @var array $medicos */
    /** @var array $especialidades */
    /** @var array $disponibilidades */

$this->title = 'Create Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'pacientes' => $pacientes,
            'medicos' => $medicos,
               'especialidades' => $especialidades,
                 'disponibilidades' => $disponibilidades,
    ]) ?>

</div>