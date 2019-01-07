<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    require'class.phpmailer.php';
    if($_POST){
      $dwes = "mysql:host=localhost;dbname=proyecto";
        $conexion = new PDO($dwes, 'JuanBlog', 'JuanBlog');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM usuarios WHERE Correo= :login ";
        $resultado=$conexion->prepare($sql);
      
       $email=htmlentities(addslashes($_POST['usuario']));
       
       $resultado->bindValue(":login", $email);
       $resultado->execute();
       $registro=$resultado->rowCount();
    
    
     if($registro!=0){
        session_start();
        $stock = $resultado->fetch();
        $correo = $stock['Correo'];
         echo $correo;
         
        //Nuevo correo electronico
      $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "xxxxxx";
    $mail->Password = "xxxx";
    $mail->SetFrom("xxxxxx@xxxxx.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("xxxxxx@xxxxx.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
        
        
   }
    }
?>

       <form action="" method="post">
       <table>
           <tr>
               <td>Login</td>
               <td><input type="text" name="usuario"></td>
           </tr>
           <tr>
               <td colzpan="2"><input type="submit" name="enviar" value="Login"></td>
           </tr>
          
        </table>
   </form>
</body>
</html>-->