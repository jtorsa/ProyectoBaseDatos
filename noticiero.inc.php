<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <a href="index.php">Inicio</a>
    <?php
        function mostrarDatos($resultado){
            if($resultado !=NULL){
         
            $id=$resultado['Identificador'];
            $titulo=$resultado['Titulo'];
            $cuerpo=$resultado['Cuerpo'];
            $cuerpo=substr($cuerpo,0,150).'...';
            
            echo "<h5>".$titulo."</h5></br>";
            echo "<p>".$cuerpo."</p></br>";
            echo '<a href="noticiaRequerida.php?no='.$id.'">Leer Más</a>';
            }
        }
    
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `noticias` WHERE Identificador <=(SELECT MAX(Identificador) FROM noticias) ORDER BY Identificador DESC";
        $resultado=$conexion->query($sql);
    
        $registro=$resultado->rowCount();
    
        while($fila=$resultado->fetch()){
            mostrarDatos($fila);
        }
    
    
    ?>
</body>
</html>