<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Disponibilidadehorario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="disponibilidadehorario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'medico_id')->textInput() ?>

    <?= $form->field($model, 'dia_da_semana')->dropDownList([ 'Segunda-feira' => 'Segunda-feira', 'Terça-feira' => 'Terça-feira', 'Quarta-feira' => 'Quarta-feira', 'Quinta-feira' => 'Quinta-feira', 'Sexta-feira' => 'Sexta-feira', 'Sábado' => 'Sábado', 'Domingo' => 'Domingo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'horario_inicio')->textInput() ?>

    <?= $form->field($model, 'horario_fim')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
