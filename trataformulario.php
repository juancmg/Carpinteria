<html>
<body>

<?php
$txt= "Nombre: ".$_POST["nombre"]." Correo: ".$_POST["correo"]. " Telefono: ".$_POST["telef"];
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?> 
</body>
</html> 