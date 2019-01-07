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
  <section class="cabecera">
        <section class="header">
            <div class="container">
                <img class="logo" src="adds/images/Logo.png" alt="logo">
            </div>
        </section>
        <section class="nav">
            <nav id="menu">

                <a class="enlace" href="noticiaNueva.php">Crear noticia</a>
                <a class="enlace">|</a>
                <a class="enlace" href="noticiero.inc.php">Noticiario</a>
                <a class="enlace" >|</a>
                <a class="enlace" href="index.php">Inicio</a>
                <a class="enlace" >|</a>
                <a class="enlace" href="logout.inc.php">Cerrar sesión</a>


            </nav>
        </section>
    </section>
   <?php
       // session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.php");
        }
    
    
    
    ?>
    <h1>Esta pagina es para Usuarios registrados</h1>
    <?php
        echo "Pagina personal de " . $_SESSION["usuario"]."<br>";
     ?>
     
     <?php
     require_once("mostrarNoticia.php");
     require_once("nuevoComentario.php");
     require_once("mostrarComentarios.php");
    ?>
</body>
</html>