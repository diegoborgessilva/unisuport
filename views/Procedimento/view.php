<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProcedimentoModel */



?>
<div class="procedimento-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->idProcedimento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->idProcedimento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja apagar este item?',
                'method' => 'post',
            ],
        ]) ?>
        
         <?= Html::a('Download', ['download', 'id' => $model->idProcedimento], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'descricao',
            'categoria',
        'status',
            'file',
        ],
    ]) ?>

</div>
