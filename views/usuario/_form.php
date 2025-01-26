<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'senha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_usuario')->dropDownList([
        'Atendente' => 'Atendente',
        'Medico' => 'Medico',
        'Cliente' => 'Cliente',
        'Administrador' => 'Administrador',
    ], ['prompt' => 'Selecione um tipo de usuário']) ?>

    <!-- Remover o campo data_cadastro -->
    <?php // $form->field($model, 'data_cadastro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
