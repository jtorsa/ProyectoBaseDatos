<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
   
   <h1>Introduce tus datos</h1>
   <form action="compruebaLogin.php" method="post">
       <table>
           <tr>
               <td>Login</td>
               <td><input type="text" name="login"></td>
           </tr>
           <tr>
               <td>Contraseña</td>
               <td><input type="password" name="password"></td>
           </tr>
           <tr>
               <td colzpan="2"><input type="submit" name="enviar" value="Login"></td>
           </tr>
           <tr>         
           </tr>
           <tr>
               <td colzpan="2"><a href="usuarioNuevo.php">Pincha aquí para registrarte</a></td>
           </tr>
         <!--  <tr>
               <td colzpan="2"><a href="recuperarPass.php">¿Has perdido tu contraseña?</a></td>
           </tr> -->
        </table>
   </form>
    
</body>
</html>