<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\TreinamentoModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treinamento-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput() ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'file')->fileInput();?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
