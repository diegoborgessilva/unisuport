<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostModel */

$this->title = 'Aterar Post';
 
 
?>
<div class="post-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
