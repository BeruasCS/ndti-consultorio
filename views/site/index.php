<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Consultório Vem pra Moc';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem-vindo ao Consultório Vem pra Moc!</h1>
        <p class="lead">Interaja, gerencie e administre de forma conveniente e segura.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Pacientes</h2>
                <p>Gerencie os dados dos pacientes cadastrados.</p>
                <p><?= Html::a('Gerenciar Pacientes', ['paciente/index'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Médicos</h2>
                 <p>Cadastre e gerencie os médicos do consultório.</p>
                <p><?= Html::a('Gerenciar Médicos', ['medico/create'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Especialidades</h2>
                 <p>Gerencie as especialidades médicas disponíveis.</p>
                <p><?= Html::a('Gerenciar Especialidades', ['especialidade/index'], ['class' => 'btn btn-success']) ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Agendamentos</h2>
                 <p>Agende e controle as consultas do consultório.</p>
                <p><?= Html::a('Agendar Consulta', ['consulta/create'], ['class' => 'btn btn-success']) ?></p>
            </div>
          <div class="col-lg-4">
                <h2>Prontuários</h2>
               <p>Gerencie os prontuários eletrônicos dos pacientes.</p>
                <p><?= Html::a('Ver Prontuários', ['prontuario/index'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Usuários</h2>
                  <p>Gerencie os usuários do sistema.</p>
                <p><?= Html::a('Gerenciar Usuários', ['usuario/index'], ['class' => 'btn btn-success']) ?></p>
            </div>
             </div>

         <div class="row">
              <div class="col-lg-12 text-center mt-3">
                   <h2>Agendamento Rápido</h2>
                  <p>Clique no botão abaixo para agendar uma nova consulta rapidamente.</p>
                  <p><?= Html::a('Agendar Consulta', ['consulta/create'], ['class' => 'btn btn-success']) ?></p>
                </div>
        </div>


    </div>
</div>