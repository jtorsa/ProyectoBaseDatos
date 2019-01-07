<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Noticia nueva</title>
</head>
<body>
  <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("location:login.php");
        }
    

        try {
            $dwes = "mysql:host=localhost;dbname=proyecto";
            $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    
        if($_POST){
            //esto es una prueba para GitHub
            $stmt = $conexion->prepare("INSERT INTO noticias (Titulo, Cuerpo , Fecha , Usuario) VALUES (?, ?, ?, ?)");
            // Bind
            $titulo = $_POST['titulo'];
            $cuerpo= $_POST['cuerpo'];
            $fecha = date('Y-m-d H:i:s');
            $user = $_SESSION["id"];
            
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $cuerpo);
            $stmt->bindParam(3, $fecha);
            $stmt->bindParam(4, $user);
            echo '<br>';
            
            try {
            // Execute
            $stmt->execute();
                 } catch (PDOException $e){
            echo $e->getMessage();
            }
           // echo $stmt->errorCode();
           // print_r($stmt->errorInfo());
        }
    
    ?>
     <form name="formulario" action="#" method="post" >
        <div class="">
          <fieldset>
           <legend>Datos de la noticia</legend>
            Título  <input name="titulo" type="text" style="width:325px;height:20px"  maxlength="80"/><br>
            Cuerpo <textarea name="cuerpo" type="text" rows="20" cols="100" maxlength="5000"></textarea> <br>		
        </fieldset>
         <footer>
                <p id="botones">
                <button type="submit">Publicar</button>
                </p>
                <a href="registrados.php">Volver al inicio</a>
            </footer>
         </div>
    </form>
 
</body>
</html>