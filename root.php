<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php
         session_start();
        echo "Pagina de ".$_SESSION["usuario"];?></title>
</head>
<body>
   <?php

        if(!isset($_SESSION['usuario'])){
            header("location:login.php");
        }
        

        require_once("style.inc.php");
        require("adds/cabeceraRoot.inc.php");
    ?>
    <div class="row">
        <div class="col-md-6"><?php
    require("mostrarUsuarios.php");
     ?></div>
        <div class="col-md-6">

        </div>

    </div>
    <h1>Root</h1>
</body>
</html>