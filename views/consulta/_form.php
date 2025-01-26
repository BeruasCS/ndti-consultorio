<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Consulta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->textInput() ?>

    <?= $form->field($model, 'medico_id')->textInput() ?>

    <?= $form->field($model, 'especialidade_id')->textInput() ?>

    <?= $form->field($model, 'hora_consulta')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Agendado' => 'Agendado', 'Cancelado' => 'Cancelado', 'Realizado' => 'Realizado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'disponibilidade_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
