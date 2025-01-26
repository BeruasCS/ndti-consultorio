<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Medico $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $especialidades */
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

    <?= $form->field($model, 'especialidades')->checkboxList(
        ArrayHelper::map($especialidades, 'id', 'nome_especialidade'),
        ['name' => 'especialidades']
    ) ?>
    <label>Dias de Disponibilidade:</label>
       <div id="disponibilidades-container">

        </div>
        <?= Html::button('Adicionar Disponibilidade', [
            'class' => 'btn btn-success',
            'onclick' => 'addDisponibilidade()',
            'style' => 'margin-top:10px',
        ]) ?>
        <script>
            function addDisponibilidade() {
                let container = document.getElementById('disponibilidades-container');
                let newDiv = document.createElement('div');
                newDiv.innerHTML = `
                 <div class="row">
                      <div class="col-md-4">
                          <select name="disponibilidadeHorarios[][dia_da_semana]" class="form-control">
                              <option value="Segunda-feira">Segunda-feira</option>
                              <option value="Terça-feira">Terça-feira</option>
                              <option value="Quarta-feira">Quarta-feira</option>
                              <option value="Quinta-feira">Quinta-feira</option>
                              <option value="Sexta-feira">Sexta-feira</option>
                              <option value="Sábado">Sábado</option>
                              <option value="Domingo">Domingo</option>
                          </select>
                      </div>
                        <div class="col-md-4">
                            <input type="time" name="disponibilidadeHorarios[][horario_inicio]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="disponibilidadeHorarios[][horario_fim]" class="form-control" required>
                        </div>
                    </div>
                    <br>
                `;
                container.appendChild(newDiv);
            }
        </script>
        <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>