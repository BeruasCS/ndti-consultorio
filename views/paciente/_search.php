<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PacienteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="paciente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome_completo') ?>

    <?= $form->field($model, 'data_nascimento') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'complemento') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'cep') ?>

    <?php // echo $form->field($model, 'telefone_primario') ?>

    <?php // echo $form->field($model, 'telefone_secundario') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'cpf') ?>

    <?php // echo $form->field($model, 'nome_emergencia') ?>

    <?php // echo $form->field($model, 'contato_emergencia') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
