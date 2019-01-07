try {
        $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT Nick FROM `usuarios` WHERE Id=:id";
        $resultado=$conexion->prepare($sql);
       
       $login=htmlentities(addslashes($_POST["login"]));  
       
       $password=htmlentities(addslashes($_POST["password"]));
       $password=md5($password);
       echo $password;
       
       $resultado->bindValue(":login", $login);
       $resultado->bindValue(":password", $password);
       $resultado->execute();
       

       $registro=$resultado->rowCount();
       $stock = $resultado->fetch();
       $id=$stock['Id'];
       

       if($registro!=0){
        session_start();
        $_SESSION["usuario"]=$_POST["login"];
        $_SESSION["id"]=$id;
           
        header("location:registrados.php");
       
       }else{
           header("location:login.php");
       
       }

       
        } catch (PDOException $e){
            echo $e->getMessage();
        }

  
    ?>