<?php
$nombre=$_POST['nombre'];
$ruta=$_POST['ruta'];
$banner=$_POST['banner'];

include 'conexiondb.php';

if (empty($_POST['id'])) {
    
    //echo "NO entra echo";
    $sql = "INSERT INTO images (nombre, ruta, banner)
    VALUES ('$nombre', '$ruta', '$banner')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo $nombre." con ruta=".$ruta." actualizado con exito";

}
else {
    $id=$_POST['id'];
    //echo "Entramos en el else de modificar";
    $sql = "UPDATE images SET nombre='$nombre', ruta='$ruta', banner='$banner' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   echo $nombre." con id=".$id." actualizado con exito";
 
}
?>