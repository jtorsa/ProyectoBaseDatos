<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php
         session_start();
        echo "Pagina de ".$_SESSION["usuario"];?></title>
    <?php
    require_once("style.inc.php");
    ?>
</head>
<body>
  <?php
        require_once("style.inc.php");

     if(!isset($_SESSION["usuario"])){
            require("adds/cabecera.inc.php");
        }else{
         require("adds/cabeceraReg.inc.php");
     }
    ?>
   <?php
       // session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.php");
        }
    
    
    
    ?>
    <?php
        echo "Pagina personal de <h5>" . $_SESSION["usuario"]."</h5><br>";
     ?>
     <section class="principal">
        <div class="row">
            <div class="col-md-9">
                <div class="noticia">
                    <?php
                        require_once("noticieroMini.inc.php");
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="noticiero">
                    <?php
                        require_once("calendario.php");
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                if(!isset($_SESSION["usuario"])){
                   require_once("mostrarComentarios.php");
                }
            ?>
        </div>
    </section>

</body>
</html>