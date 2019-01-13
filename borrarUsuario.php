
<?php
    session_start();
        require_once("style.inc.php");
    if(!isset($_SESSION["usuario"])){
            require("adds/cabecera.inc.php");
        }else{
         require("adds/cabeceraReg.inc.php");
    }
$servername = "localhost";
$username = "JuanBlog";
$password = "JuanBlog";
$dbname = "proyecto";
$id=htmlentities(addslashes($_GET["borra"])); 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

// sql to delete a record
$sql = "DELETE FROM `usuarios` WHERE Id=".$id;

if (mysqli_query($conn, $sql)) {
    echo "El usuario ha sido borrado.<br>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>