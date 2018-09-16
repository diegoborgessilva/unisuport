<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MensagemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mensagens';
  
  
    include_once "config/defines.php";
    require_once('config/BD.php');
    BD::conn();
 $this->render('chat') ;

?>
 <div class="site-contact">

    <?= $this->render('chat.php') ; ?> 
     
 </div>