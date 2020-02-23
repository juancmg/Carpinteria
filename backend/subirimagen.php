
<!DOCTYPE html>
<html>
<body>

<form id="subirimagen" class="my_form" enctype="multipart/form-data">
    <div class="form-group col-6">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <label >Categoria: </label> 
    <select name="ruta">
     <?php
    include 'conexiondb.php';
    $sql = "SELECT id, nombre, ruta FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
  <option value="<?php echo $row["ruta"] ?>" selected="selected"><?php echo $row["nombre"]?></option>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>
        </select>
        <input type="submit" value="Subir imagen" name="submit">
    </div>
</form>

</body>
  <script>
$('#subirimagen').submit(function()
{
  event.preventDefault();
  $.ajax(
  { 
    url: "uploadimage.php",
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function(data)
    {
        alert(data);
      $("#cuerpo").load("subirimagen.php");    
  
    }
  });

});
</script>
</html>
