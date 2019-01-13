<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
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
    
        try{
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `noticias` WHERE Identificador ORDER BY Identificador DESC LIMIT 5";
        $resultado=$conexion->query($sql);
    
        $registro=$resultado->rowCount();
    
        while($fila=$resultado->fetch()){
            mostrarDatos($fila);
        }
    }catch(PDOException $e){
            echo "No se pueden mostrar las noticias";
        }
    
    ?>
</body>
</html>