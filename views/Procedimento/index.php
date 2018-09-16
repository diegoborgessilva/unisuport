<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcedimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procedimentos';
 
?>
<div class="procedimento-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo Procedimento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            
            'titulo',
            'descricao',
            'categoria',
          'status',
            'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
