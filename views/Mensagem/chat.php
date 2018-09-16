<?php
	 
	include_once "config/defines.php";
            include_once "enviar.php";
  

   
    require_once('config/BD.php');
    BD::conn();
$this->registerJsFile('config/js/functions.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset=UTF-8>
         <script type="text/javascript" src="config/js/functions.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="config/js/jquery.js"></script>
        <script type="text/javascript" src="config/js/jquery_play.js"></script>
        <script type="text/javascript">
            $.noConflict();
        </script>
        
    </head>
    <body>
		<div class="formulario">
 <?php

    $email = 'mariasilva@gmail.com';    
    $pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios`");
    $pegaUser->execute();
    if($pegaUser->rowCount() == 0){
       echo 'Não encontramos este login!';
    }else{
       $agora = date('Y-m-d H:i:s');
       $limite = date('Y-m-d H:i:s', strtotime('+2 min'));
        $update = BD::conn()->prepare("UPDATE `usuarios` SET `horario` = ?, `limite` = ? WHERE `email` = ?");
       if( $update->execute(array($agora, $limite, $email)) ){
           while($row = $pegaUser->fetchObject()){
                $_SESSION['email_logado'] = $email;
                $_SESSION['id_user'] = $row->id;                                                                     }
                 }//se atualizou
        }
    $pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");
    $pegaUser->execute(array($_SESSION['email_logado']));
    $dadosUser = $pegaUser->fetch();
    if(isset($_GET['acao']) && $_GET['acao'] == 'sair'){
        unset($_SESSION['email_logado']);
        unset($_SESSION['id_user']);
        session_destroy();
        header("Location: index.php");
    }
?>
        <span class="user_online" id="<?php echo $dadosUser['id'];?>"></span>
        <aside id="users_online">
            <ul>
            <?php
                $pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
                $pegaUsuarios->execute(array($_SESSION['id_user']));
                while($row = $pegaUsuarios->fetch()){
                    
                    $blocks = explode(',', $row['blocks']);
                    $agora = date('Y-m-d H:i:s');
                    if(!in_array($_SESSION['id_user'], $blocks)){
                        $status = 'on';
                        if($agora >= $row['limite']){
                            $status = 'off';
                        }
            ?>
                <li id="<?php echo $row['id'];?>">
                
                    <a href="#" id="<?php echo $_SESSION['id_user'].':'.$row['id'];?>" class="comecar"><?php echo utf8_encode($row['nome']);?></a>
                    <span id="<?php echo $row['id'];?>" class="status <?php echo $status;?>"></span>
                </li>
            <?php }}?>
            </ul>
        </aside>

        <aside id="chats">            
        </aside>
        <script type="text/javascript" src="config/js/functions.js"></script>
 
		</div>
	</body>
</html>