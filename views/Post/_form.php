<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\PostModel */
/* @var $form yii\widgets\ActiveForm */
 
?>

<div class="post-model-form">
 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput(['autor' => true]) ?>

    <?= $form->field($model, 'conteudo')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Postar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
