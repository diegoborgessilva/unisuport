<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModel */


?>
<div class="usuario-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja apagar este item?',
                'method' => 'post',
            ],
        ]) ?>
     
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'nome',
            'sobrenome',
            'email:email',
            'dasId',
            'telefone',
        ],
    ]) ?>

</div>
