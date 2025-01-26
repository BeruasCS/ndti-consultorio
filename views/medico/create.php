<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medico $model */
/** @var array $especialidades */

$this->title = 'Create Medico';
$this->params['breadcrumbs'][] = ['label' => 'Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'especialidades' => $especialidades,
    ]) ?>

</div>