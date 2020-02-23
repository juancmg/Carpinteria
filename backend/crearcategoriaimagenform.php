 <html>
<body>
    <form action="crearcategoriaimagen.php" class="my_form" method="post">
     <div class="form-group col-6">
<?php
    if (empty($_GET)){
?>

          
         <label>Nombre Categoria: </label> <input class="form-control" type="text" name="nombre"><br>
         <label>ruta (images/EJEMPLO): </label><input type="text" class="form-control" name="ruta" placeholder="EJEMPLO"><br>
         <label>Banner (1,2,3,4...): </label><input type="text" class="form-control" name="banner" placeholder="1,2,3..."><br>
<?php
        }
    else {
        $id=$_GET['id'];
    include 'conexiondb.php';
    $sql = "SELECT id, nombre, ruta, banner FROM images where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     ?>
         <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <label>Nombre Categoria: </label> <input class="form-control" type="text" name="nombre" value="<?php echo $row["nombre"] ?>"><br>
         <label>ruta (images/EJEMPLO): </label><input type="text" class="form-control" name="ruta" value="<?php echo $row["ruta"] ?>"><br>
         <label>Banner (1,2,3,4...): </label><input type="text" class="form-control" name="banner" value="<?php echo $row["banner"] ?>"><br>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();
     
       }
?>
      </div>
  <button type="submit" class="btn btn-primary">Submit</button>        
</form>
</body>
     <script type="text/javascript">
        function cargaajax2(){ 
            href = "categoriaform.php";
            var elem = $("#cuerpo");
            elem.load(href);
            return false;
        }  
         var frm = $('.my_form');

        frm.submit(function (e) {

            e.preventDefault();

            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    cargaajax2();
                    alert(data);
                    console.log('Submission was successful.');
                    console.log(data);
                },
                error: function (data) {
                    alert("Error");
                    console.log('An error occurred.');
                    console.log(data);
                },
            });

        });
</script>
</html> 