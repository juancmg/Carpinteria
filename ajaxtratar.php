<?php
$nombre=$_POST['name'];
$ruta=$_POST['comment'];
include 'backend/conexiondb.php';
$sql = "INSERT INTO images (nombre, ruta)
VALUES ('$nombre', '$ruta')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>