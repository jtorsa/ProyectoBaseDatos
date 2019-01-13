<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página del root</title>
</head>
<body>
    <?php
    function mostrarDatos($resultado){
            if($resultado !=NULL){
         
            $id=$resultado['Id'];
            $nick=$resultado['Nick'];
            $correo=$resultado['Correo'];
            $fecha=$resultado['FechaAlta'];
            
            echo "<p>".$nick."</p></br>";
            echo "<p>".$correo."</p></br>";
            echo "<p>".$fecha."</p></br>";
            
            
                if(isset($_SESSION['root'])){
            echo '<a href="borrarUsuario.php?borra='.$id.'">Borrar Usuario</a><br>';
                }
                echo "-------------------------------------------------";
            }
        }
    
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `usuarios` ";
        $resultado=$conexion->query($sql);
    
        $registro=$resultado->rowCount();
    
        while($fila=$resultado->fetch()){
            mostrarDatos($fila);
        }
    
    
    ?>
    
</body>
</html>