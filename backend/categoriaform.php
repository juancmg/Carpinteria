 <html>
<body>

<style type="text/css">
a.botone:{
cursor: pointer;

}
a.botone:hover {
cursor: pointer;
}
    .btn:hover{
        cursor:pointer;
    }
</style>
    <form method="POST" class="my_form" action="categoriatratar.php">

<table class="table table-striped">
    <thead>
    <tr>
        <th class="check table-danger" style="display:none;">Eliminar</th>
      <th>id#</th>
      <th>Nombre</th>
      <th>Ruta</th>
      <th>Banner</th>
      <th id="modi" style="display:none;">Modificar</th>
    </tr>
  </thead>
  <tbody>
       <?php
    include 'conexiondb.php';
    $sql = "SELECT id, nombre, ruta, banner FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td class="check" style="display:none;"><input type="checkbox" name="categoriaschk[]" value="<?php echo $row["id"] ?>" form="my_form"/></td>
          <th scope="row"><?php echo $row["id"] ?></th>
          <td><?php echo $row["nombre"]?></td>
          <td><?php echo $row["ruta"]?></td>
          <td><?php echo $row["banner"]?></td>
          <td class="mod" style="display:none;"> <a  class="modify" href="crearcategoriaimagenform.php?id=<?php echo $row["id"] ?>"><i class="fa fa-pencil-square-o"> Modificar</i></a></td>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>
    </tr>
       
       <tr>
        <td >
            <a href="#" id="crear" class="botone"><i class="fa fa-plus"> Añadir</i></a>
            <a href="#" id="mostrar" class="botone"><i class="fa fa-times"> Eliminar</i></a>
            <a href="#" id="modificar" class="botone"><i class="fa fa-pencil-square-o"> Modificar</i></a>
            <button  style="display:none;" id="eliminar" class="btn table-danger">Eliminar</button>
            <button onclick="volver()" class="btn table-warning" style="display:none;" id="volver"><i class="fa fa-pencil-square-o"> Volver</i></button>
            
           
           </td>
        
    </tr>
  </tbody>

</table>
</form>



</body>
      <script>
    $(document).ready(function()  {
        var elementomostrar = $("#mostrar");
        var elementomodificar = $("a#modificar");
        var elementocrear = $("a#crear");
        var formmodificar = $("a.modify");
        var modoff=true;

        elementocrear.click(mostrarcrear);
        elementomostrar.click(mostrareliminar);
        elementomodificar.click(mostrarmodificar);
        formmodificar.click(mostrarformmodificar);
        function mostrarmodificar(){
            if (modoff){
            $("th#modi").removeAttr("style").show();
            $("td.mod").removeAttr("style").show();
            modoff=false;
            }
            else {
            $("th#modi").removeAttr("style").hide();
            $("td.mod").removeAttr("style").hide(); 
            modoff=true;
            }
        
        }
        
        function mostrarcrear(){ 
        href = "crearcategoriaimagenform.php";
        var elem = $("#cuerpo");
        elem.load(href);
        return false;
            } 
        function mostrarformmodificar(){ 
        href = $(this).attr('href');
        var elem = $("#cuerpo");
        elem.load(href);
        return false;
            }  
        
         function mostrareliminar(){ 
        href = "eliminarcategoriaimagenform.php";
        var elem = $("#cuerpo");
        elem.load(href);
        return false;
            } 
        /*function mostrareliminar(){
           elementomostrar.removeAttr("style").hide();
            $("#eliminar").show();
            $(".check").show();
            $(".botone").removeAttr("style").hide();
            $("#volver").removeAttr("style").show();
             $("th#modi").removeAttr("style").hide();
            $("td.mod").removeAttr("style").hide();

        }*/
         function volver(){ 
            href = "categoriaform.php";
            var elem = $("#cuerpo");
            elem.load(href);
            return false;
        }  
      


      
      
})
</script> 
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