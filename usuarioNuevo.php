<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <style>
        @import url("css/bootstrap.min.css");
        @import url("adds/Principal.css");
        @import url("css/bootstrap.min.css.map");
        @import url("css/font-awesome.css");
        @import url("css/font-awesome.min.css");
    </style>
    <?php
            session_start();
        if(isset($_SESSION['palabra']))
            $randomWord = $_SESSION['palabra'];
        /*var_dump($_POST);*/
        $ok = "";$show = false;
    ?>
</head>

<body>
    <a href="index.php">Inicio</a>
    <?php
        try {
            $dwes = "mysql:host=localhost;dbname=proyecto";
            $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        if($_POST){
            if($_POST['captcha']==$randomWord){
                $captchaTrue=true;
            }else{$captchaTrue=false;}
        }
    
        //A partir de aqui se comprueba la imagen introducida por el usuario
     if($_POST){
        // Se comprueba si hay un error al subir el archivo
if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { 
	echo 'Error: ';
	switch ($_FILES['imagen']['error']) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE: echo 'El fichero es demasiado grande'; break;
		case UPLOAD_ERR_PARTIAL: echo 'El fichero no se ha podido subir entero'; break;
		case UPLOAD_ERR_NO_FILE: echo 'No se ha podido subir el fichero'; break;
		default: echo 'Error indeterminado.';
	}
	exit();
}
if ($_FILES['imagen']['type'] != 'image/png') { // Se comprueba que sea del tipo esperado
	echo 'Error: No se trata de un fichero .PNG.';
	exit();
}
          $nick = $_POST['nick'];
// Si se ha podido subir el fichero se guarda
if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true) {
	// Se comprueba que ese nombre de archivo no exista
	$ruta = './adds/images/'.$nick.'.png';
	if (is_file($ruta) === true) {
		$idUnico = time();
		$ruta = $idUnico.'_'.$ruta;
	}
	// Se mueve el fichero a su nueva ubicación
	if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
		echo 'Error: No se puede mover el fichero a su destino';
	}else{
		echo "La imagen se ha añadido correctamente";
	}
}
else
	echo 'Error: posible ataque. Nombre: '.$_FILES['imagen']['name'];
     }
            
        if($_POST&&$captchaTrue==true){
            try {
            //esto es una prueba para GitHub
            $stmt = $conexion->prepare("INSERT INTO usuarios (Nick, Correo, Password, Nombre, Apellidos, FechaAlta, Root) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // Bind
            $nick = $_POST['nick'];
            $correo=$_POST['correo'];
            $password= $_POST['password'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fechaAlta = date('Y-m-d H:i:s');
            $root = false;
            $password=md5($password);
            
            $stmt->bindParam(1, $nick);
            $stmt->bindParam(2, $correo);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $nombre);
            $stmt->bindParam(5, $apellidos);
            $stmt->bindParam(6, $fechaAlta);
            $stmt->bindParam(7, $root);
            echo '<br>';
            
            echo "El registro se ha completado correctamente.<br>";
            echo $ruta;
            // Execute
            $stmt->execute();
                 } catch (PDOException $e){
            echo $e->getMessage();
            echo 'Algo ha fallado en el registro.';
            }
            //echo $stmt->errorCode();
          //  print_r($stmt->errorInfo());
        }
    

    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form name="formulario" action="#" method="post" enctype="multipart/form-data">
                        <div class="">
                            <fieldset>
                                <legend>Datos de Usuario</legend>
                                Nick<input name="nick" type="text" /><br>
                                Email<input name="correo" type="email" /><br>
                                Password<input name="password" type="password" /><br>
                                Nombre<input name="nombre" type="text" /><br>
                                Apellidos<input name="apellidos" type="text" /><br>

                                <br>
                                Selecciona el archivo a subir(debe ser .png:
                                <input type="file" name="imagen" id="imagen"><br>
                                <img src="adds/captcha.inc.php" alt="captcha" title="captcha">
                                <input type="text" name="captcha" autofocus><label for="texto"></label>

                            </fieldset>
                            <footer>
                                <p id="botones">
                                    <button type="submit">Registro</button>
                                </p>
                            </footer>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</body>

</html>