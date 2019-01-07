<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `noticias` WHERE Identificador = (SELECT MAX(Identificador) FROM noticias)";
        $resultado=$conexion->query($sql);
    
        $registro=$resultado->rowCount();
        $stock = $resultado->fetch();
    
        if($registro!=0){
            $_SESSION['Noticia']=$stock['Identificador'];
            $titulo=$stock['Titulo'];
            $cuerpo=$stock['Cuerpo'];
            $fecha=$stock['Fecha'];
            $user=$stock['Usuario'];
            
            $dwes = "mysql:host=localhost;dbname=proyecto";
            $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT Nick FROM usuarios WHERE Id= :nick";
            $resultado=$conexion->prepare($sql);
            $nick=htmlentities(addslashes($user));
            $resultado->bindValue(":nick", $nick);
            $resultado->execute();
            $registro=$resultado->rowCount();
    
            $fila=$resultado->fetch();
            $nombre=$fila["Nick"];
            
            echo '<h3 style="text-align:center">'.$titulo.'</h3></br>';
            echo 'Noticia publicada por '.$nombre.'<br>';
            echo '<p style="color: grey">Fecha de publicación: '.$fecha.'</p>';
            echo "<p>".$cuerpo."</p></br>";
            echo $fecha;
       }else{
       
            echo "No se puede mostrar la noticia";
            
       }
    ?>
</body>
</html>