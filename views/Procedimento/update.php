<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProcedimentoModel */

$this->title = 'Alterar procedimento';

?>
<div class="procedimento-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
