<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
     <?php
    
    
        function mostrarComentarios($resultado){
            if($resultado !=NULL){
         
            $id=$resultado['Identificador'];
            $cuerpo=$resultado['Cuerpo'];
            $user=$resultado['Usuario'];
            $fecha=$resultado['Fecha'];
            $noticia=$resultado['Noticia'];
            $actual = date('Y-m-d');
                
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
            
            
            echo "<br><br><h6>".$cuerpo."</h6></br>";
                if($fecha==$actual){
                    echo "Comentado hoy por ".$nombre.".</br>";
                }else{
                     echo "Comentado por ".$nombre." el día ".$fecha.".</br>";
                }
                
            }
        }
    
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `comentarios` WHERE Identificador >((SELECT MAX(Identificador) FROM comentarios)-5 ) AND Noticia = :noticia ORDER BY Identificador DESC";
        $resultado=$conexion->prepare($sql);
        $noticia=htmlentities(addslashes($_SESSION["Noticia"]));
        $resultado->bindValue(":noticia", $noticia);
        $resultado->execute();
    
        $registro=$resultado->rowCount();
    
        while($fila=$resultado->fetch()){
            mostrarComentarios($fila);
        }
    
    
    ?>
</body>
</html>