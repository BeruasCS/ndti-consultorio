<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Medico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="medico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_completo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'crm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone_primario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone_secundario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_atendimento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
