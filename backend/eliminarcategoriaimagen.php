<?php
$id=$_POST['id'];
include 'conexiondb.php';
$sql = "DELETE FROM images WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>