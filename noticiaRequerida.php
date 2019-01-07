<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   <a href="index.php">Inicio</a>
    <?php
    session_start();
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM noticias WHERE Identificador = :Identificador ";
        $resultado=$conexion->prepare($sql);
       
       $id=htmlentities(addslashes($_GET["no"]));  
       
       
       $resultado->bindValue(":Identificador", $id);
       $resultado->execute();
        $registro=$resultado->rowCount();
        $stock = $resultado->fetch();
    
        if($registro!=0){
            
            $titulo=$stock['Titulo'];
            $cuerpo=$stock['Cuerpo'];
            $fecha=$stock['Fecha'];
            
      
            echo "<h1>".$titulo."</h1></br>";
            echo "<h3>".$cuerpo."</h3></br>";
            echo $fecha;
       }else{
       
            echo "No se puede mostrar la noticia";
            
       }
    
    
    ?>
    
</body>
</html>