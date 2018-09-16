<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreinamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treinamentos';
?>
<div class="treinamento-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo treinamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'codigo',
            'nome',
            'descricao',
            'categoria',
            'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
