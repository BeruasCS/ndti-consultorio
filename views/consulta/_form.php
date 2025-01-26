<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Consulta $model */
/** @var yii\widgets\ActiveForm $form */
  /** @var array $pacientes */
/** @var array $medicos */
/** @var array $especialidades */
  /** @var array $disponibilidades */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'paciente_id')->dropDownList(
          ArrayHelper::map($pacientes, 'id', 'nome_completo'),
            ['prompt' => 'Select a patient']
        ) ?>


        <?= $form->field($model, 'medico_id')->dropDownList(
              ArrayHelper::map($medicos, 'id', 'nome_completo'),
               ['prompt' => 'Select a doctor']
             ) ?>

        <?= $form->field($model, 'especialidade_id')->dropDownList(
              ArrayHelper::map($especialidades, 'id', 'nome_especialidade'),
            ['prompt' => 'Select a specialty']
          ) ?>
         <?= $form->field($model, 'disponibilidade_id')->dropDownList(
              ArrayHelper::map($disponibilidades, 'id', function($disponibilidade){
                  return $disponibilidade['dia_da_semana'] . ' - ' . $disponibilidade['horario_inicio'] . ' - ' . $disponibilidade['horario_fim'];
                }),
                 ['prompt' => 'Select an hour']
             ) ?>

        <?= $form->field($model, 'hora_consulta')->textInput() ?>

        <?= $form->field($model, 'status')->dropDownList([ 'Agendado' => 'Agendado', 'Cancelado' => 'Cancelado', 'Realizado' => 'Realizado', ], ['prompt' => '']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>