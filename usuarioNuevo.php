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
</head>
<body>
   
    <?php
        try {
            $dwes = "mysql:host=localhost;dbname=proyecto";
            $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    
        if($_POST){
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
            
            header("location:login.php");
            try {
            // Execute
            $stmt->execute();
                 } catch (PDOException $e){
            echo $e->getMessage();
            }
            echo $stmt->errorCode();
            print_r($stmt->errorInfo());
        }
    
    ?>
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form name="formulario" action="#" method="post" >
                        <div class="">
                        <fieldset>
                           <legend>Datos de Usuario</legend>
                        Nick<input name="nick" type="text" /><br>
                        Email<input name="correo" type="email" /><br>
                        Password<input name="password" type="password" /><br>
                        Nombre<input name="nombre" type="text" /><br>
                        Apellidos<input name="apellidos" type="text" /><br>

                        <br>

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