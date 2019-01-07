<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <?php
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
            $stmt = $conexion->prepare("INSERT INTO comentarios ( Cuerpo, Usuario, Fecha , Noticia) VALUES (?, ?, ?, ?)");
            // Bind
            $cuerpo= $_POST['cuerpo'];
            $fecha = date('Y-m-d H:i:s');
            $user = $_SESSION["id"];
            $noticia=$_SESSION["Noticia"];
            
            $stmt->bindParam(1, $cuerpo);
            $stmt->bindParam(2, $user);
            $stmt->bindParam(3, $fecha);
            $stmt->bindParam(4, $noticia);
            echo '<br>';
            
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
     <form name="formulario" action="#" method="post" >
        <div class="">
          <fieldset>
           <legend>Comenta aquí</legend>  
           <textarea name="cuerpo" type="text" rows="5" cols="80" maxlength="350"></textarea><br>	
        </fieldset>
         <footer>
                <p id="botones">
                <button type="submit">Comentar</button>
                </p>
            </footer>
         </div>
    </form>
 
</body>
</html>