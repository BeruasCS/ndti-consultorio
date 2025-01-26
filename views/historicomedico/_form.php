<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Historicomedico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="historicomedico-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Campo oculto para paciente_id, preenchido automaticamente pela URL -->
    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => Yii::$app->request->get('paciente_id')])->label(false) ?>

    <?= $form->field($model, 'historico_cirurgias')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'medicamento_nome')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alergias_descricao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
