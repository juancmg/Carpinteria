<?php 
    //Tratar eliminar categoria
include 'conexiondb.php';

$id = $_POST['categoriaschk'];
  if(empty($id))
  {
    echo("You didn't select any buildings.");
  }
  else
  {
    $N = count($id);
    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        $sql = "DELETE FROM images WHERE id='$id[$i]'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }
  }
?>