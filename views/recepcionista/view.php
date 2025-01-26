<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Recepcionista $model */

$this->title = $model->id_recepcionista;
$this->params['breadcrumbs'][] = ['label' => 'Recepcionistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recepcionista-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_recepcionista' => $model->id_recepcionista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_recepcionista' => $model->id_recepcionista], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_recepcionista',
        ],
    ]) ?>

</div>
