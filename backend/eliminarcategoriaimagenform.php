 <html>
<body>

<form action="eliminarcategoriaimagen.php" class="my_form" method="post">
      <div class="form-group col-3">
<label >Categoria a eliminar</label> <br/>
    <select class="form-control" name="id">
     <?php
    include 'conexiondb.php';
    $sql = "SELECT id, nombre, ruta FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
  <option value="<?php echo $row["id"] ?>" selected="selected"><?php echo $row["nombre"]?></option>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>
        </select>
           </div>
  <button type="submit" class="btn btn-primary">Submit</button>       
</form>
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
</body>
</html> 