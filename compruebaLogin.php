<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php
        session_start();
   try {
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM usuarios WHERE Nick= :login AND Password= :password";
        $resultado=$conexion->prepare($sql);
       
       $login=htmlentities(addslashes($_POST["login"]));  
       
       $password=htmlentities(addslashes($_POST["password"]));
       $password=md5($password);
       //echo $password;
       
       $resultado->bindValue(":login", $login);
       $resultado->bindValue(":password", $password);
       $resultado->execute();
       

       $registro=$resultado->rowCount();
       $stock = $resultado->fetch();
       $id=$stock['Id'];
       $root=$stock['Root'];
       $nick=$stock['Nick'];
       

       if($registro!=0){
        $_SESSION["usuario"]=$_POST["login"];
        $_SESSION["id"]=$id;
        $_SESSION['nick']=$id;              
        if($root==1){
           
            header("location:root.php");
            
        } else{
            header("location:registrados.php");
        }      
       
       }else{
           header("location:login.php");       
       }

       
        } catch (PDOException $e){
            echo $e->getMessage();
        }

  
    ?>
    
</body>
</html>