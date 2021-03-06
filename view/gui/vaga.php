<?php

session_name('sessao');
session_start();

if (!isset($_SESSION['empresaLogada'])) {   //Verifica se há seções
  session_destroy();            //Destroi a seção por segurança
  header("Location: index.php"); 
  exit; //Redireciona o visitante para login
}

$empresa = $_SESSION['empresaLogada']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Vagas - Talents</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php include "menu.php" ?>
  
  <div class="container">
    
  <h2>Bem vindo</h2>  
  <span>Empresa </span><?php echo $empresa[0]['ds_razao_social'] ?>
 
  </div>

  
  <?php include "footer.php" ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


  </body>
</html>
