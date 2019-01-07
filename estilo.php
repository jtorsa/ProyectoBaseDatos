<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=deice-widht, initialscale=1">

    <title>Mi blog</title>
    <style>
        @import url("css/bootstrap.min.css");
        @import url("adds/Principal.css");
        @import url("css/bootstrap.min.css.map");
        @import url("css/font-awesome.css");
        @import url("css/font-awesome.min.css");
    </style>
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

                <a class="enlace" href="usuarioNuevo.php">Registro</a>
                <!--<a href="noticiaNueva.php">Crear Noticia</a>-->
                <a class="enlace" href="login.php">Login</a>


            </nav>
        </section>
    </section>
    <section class="principal">
        <div class="row">
            <div class="col-md-9">
                <div class="noticia">
                    <?php
                        require_once("mostrarNoticia.php");
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="noticiero">
                   <h4></h4>
                    <?php
                        require_once("noticieroMini.inc.php");
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