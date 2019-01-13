<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <style>
        p{
            text-align: center;
        }
        </style>
<body>
    <?php
        require_once("style.inc.php");
     
    ?>
    <?php
    session_start();
     if(isset($_SESSION['root'])){
            require("adds/cabeceraRoot.inc.php");
        }
     else if(!isset($_SESSION["usuario"])){
            require("adds/cabecera.inc.php");
        }else{
         require("adds/cabeceraReg.inc.php");
     }
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM noticias WHERE Identificador = :Identificador ";
        $resultado=$conexion->prepare($sql);
       
       $id=htmlentities(addslashes($_GET["no"]));  
       
       
       $resultado->bindValue(":Identificador", $id);
       $_SESSION['Noticia']=$id;
       $resultado->execute();
        $registro=$resultado->rowCount();
        $stock = $resultado->fetch();
    
        if($registro!=0){
            
            $titulo=$stock['Titulo'];
            $cuerpo=$stock['Cuerpo'];
            $fecha=$stock['Fecha'];
            $user=$stock['Usuario'];
            $sql="SELECT Nick FROM usuarios WHERE Id= :nick";
            $resultado=$conexion->prepare($sql);
            $nick=htmlentities(addslashes($user));
            $resultado->bindValue(":nick", $nick);
            $resultado->execute();
            $registro=$resultado->rowCount();
    
            $fila=$resultado->fetch();
            $nombre=$fila["Nick"];
            
      
            echo '<h3 style="text-align:center">'.$titulo.'</h3></br>';
            echo '<p style="color: darkgrey">Noticia publicada por '.$nombre.'</p><br>';
            echo '<p style="color: grey">Fecha de publicación: '.$fecha.'</p>';
            echo "<p>".$cuerpo."</p></br>";
       }else{
       
            echo "No se puede mostrar la noticia";
            
       }
    
    if(isset($_SESSION["usuario"])){
            require("mostrarComentarios.php");
            require("nuevoComentario.php");
            
        }
    ?>
    
</body>
</html>