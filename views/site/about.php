<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sobre o Sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Bem-vindo ao sistema de gestão do consultório <strong>Vem pra Moc</strong>. Este sistema foi desenvolvido para informatizar processos e facilitar o dia a dia do consultório, abrangendo funcionalidades como:
    </p>

    <ul>
        <li><strong>Cadastro de Pacientes:</strong> Gerencie informações pessoais, histórico médico e documentos de forma segura.</li>
        <li><strong>Agendamento de Consultas:</strong> Agende consultas com médicos por especialidade, data e horário.</li>
        <li><strong>Prontuário Eletrônico:</strong> Registre diagnósticos, tratamentos, exames e mantenha o histórico do paciente.</li>
        <li><strong>Gerenciamento de Usuários:</strong> Controle contas de administradores, atendentes e médicos.</li>
    </ul>

    <p>
        Nosso objetivo é melhorar a eficiência e a qualidade do atendimento aos pacientes, garantindo privacidade e segurança dos dados médicos conforme as regulamentações vigentes.
    </p>

    <p>
        Para mais informações ou suporte, entre em contato conosco.
    </p>

    <code><?= __FILE__ ?></code>
</div>
