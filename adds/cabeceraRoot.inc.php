<section class="cabecera">
        <section class="header">
            <div class="container">
                <img class="logo" src="adds/images/Logo.png" alt="logo">
            </div>
        </section>
        <section class="nav">
            <nav id="menu">
                
                <a class="enlace" href="index.php">Inicio</a>
                <a class="enlace" >|</a>
                <a class="enlace" href="noticiaNueva.php">Crear noticia</a>
                <a class="enlace">|</a>
                <a class="enlace" href="noticiero.inc.php">Noticiario</a>
                <a class="enlace" >|</a>               
                <a class="enlace" href="mostrarUsuarios.php">Usuarios</a>
                <a class="enlace" >|</a>               
                <a class="enlace" href="logout.inc.php">Cerrar sesión</a>


            </nav>
            <img 
            <?php
                 echo 'src="adds/images/'.$_SESSION["usuario"].'.png"';
             ?>
             class="fotoUser" alt="Imagen de usuario" height="60" width="60">
        </section>
    </section>