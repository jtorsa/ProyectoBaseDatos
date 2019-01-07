<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   <a href="index.php">Inicio</a><br>
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
                $sql="SELECT * FROM `noticias` WHERE Identificador <=(SELECT MAX(Identificador) FROM noticias) AND MONTH(Fecha)= :mes AND YEAR(Fecha) = :year ORDER BY Identificador DESC";
                $resultado=$conexion->prepare($sql);
    
                $mes=htmlentities(addslashes($_GET["no"]));
                $year=htmlentities(addslashes($_GET["year"]));

                $resultado->bindValue(":mes", $mes);
                $resultado->bindValue(":year", $year);
                $resultado->execute();
                $registro=$resultado->rowCount();
                $stock = $resultado->fetch();

                if($registro==0){
                    echo "No hay ninguna noticia que corresponda a esa fecha";
                }
                while($fila=$resultado->fetch()){
                    mostrarDatos($fila);
                }

    ?>
    
</body>
</html>