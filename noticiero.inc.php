<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("style.inc.php");
        session_start();
       if(isset($_SESSION['root'])){
            require("adds/cabeceraRoot.inc.php");
        }
     else if(!isset($_SESSION["usuario"])){
            require("adds/cabecera.inc.php");
        }else{
         require("adds/cabeceraReg.inc.php");
     }
        function mostrarUsuario($resultado){
            if($resultado !=NULL){
         
            $id=$resultado['Identificador'];
            $titulo=$resultado['Titulo'];
            $cuerpo=$resultado['Cuerpo'];
            $cuerpo=substr($cuerpo,0,150).'...';
            
            echo "<h5>".$titulo."</h5></br>";
            echo "<p>".$cuerpo."</p></br>";
            echo '<a href="noticiaRequerida.php?no='.$id.'">Leer Más</a><br>';
                if(isset($_SESSION["root"])){
            echo '<a href="borrarNoticia.php?borra='.$id.'">Borrar Noticia</a>';
                }
            }
        }
    
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `noticias` WHERE Identificador <=(SELECT MAX(Identificador) FROM noticias) ORDER BY Identificador DESC";
        $resultado=$conexion->query($sql);
    
        $registro=$resultado->rowCount();
    
        while($fila=$resultado->fetch()){
            mostrarUsuario($fila);
        }
    
    
    ?>
    
</body>
</html>