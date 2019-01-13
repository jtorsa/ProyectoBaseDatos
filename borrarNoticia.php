
<?php
    session_start();
        require_once("style.inc.php");
    if(isset($_SESSION['root'])){
            require("adds/cabeceraRoot.inc.php");
        }
     else if(!isset($_SESSION["usuario"])){
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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM `comentarios` WHERE Noticia=".$id;

if (mysqli_query($conn, $sql)) {
    echo "Todos los comentarios de la noticia han sido borrados.<br>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// sql to delete a record
$sql = "DELETE FROM `noticias` WHERE Identificador=".$id;

if (mysqli_query($conn, $sql)) {
    echo "La noticia ha sido borrada.<br>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>