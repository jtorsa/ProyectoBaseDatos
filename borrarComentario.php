
<?php
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
$sql = "DELETE FROM `comentarios` WHERE Identificador=".$id;


if (mysqli_query($conn, $sql)) {
    echo "Comentario borrado correctamente.<br>";
     echo '<a href="noticiaRequerida.php?no='.$_SESSION["Noticia"].'">Leer Más</a>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>