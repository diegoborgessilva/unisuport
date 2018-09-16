<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreinamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treinamento-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTreinamento') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'categoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
