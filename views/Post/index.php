<?php

use yii\helpers\Html;
use yii\grid\GridView;
require_once 'system/config.php';
require_once 'system/database.php';

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="post-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $posts = DBRead('post', 'ORDER BY data DESC');

        if (!$posts)
            echo '<h2>Não há postagens!</h2>';
        else 
            foreach ($posts as $post):
    ?>

    <hr>
    <h2>
        <?php echo $post['titulo']; ?>
    </h2>

    <p>
        por <b><?php echo $post['autor']; ?></b>
        em <b><?php echo date('d/m/Y', strtotime($post['data'])) ?></b> |
        
    </p>

    <p>
        <?= Html::a('Detalhes', ['view', 'id' =>$post['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Alterar', ['update', 'id' =>$post['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $post['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>
    <?php endforeach; ?>
</div>
