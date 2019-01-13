<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=deice-widht, initialscale=1">

    <title>Mi blog</title>
    <?php
    require_once("style.inc.php");
    ?>
</head>

<body>
    <?php
        session_start();
        require_once("style.inc.php");
    
    if(isset($_SESSION['root'])){
            require("adds/cabeceraRoot.inc.php");
        }
     else if(!isset($_SESSION["usuario"])){
            require("adds/cabecera.inc.php");
        }else{
         require("adds/cabeceraReg.inc.php");
     }
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
                   <h4></h4>
                    <?php
                        require_once("calendario.php");
                    ?>
                </div>
            </div>
        </div>
    </section>







    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</body>

</html>