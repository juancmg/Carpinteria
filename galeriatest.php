<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
   <?php 
        $ruta="images/".$_GET['galeria']."/"; 
      //$galeria=$_GET['galeria'];
      
     /* switch ($galeria) {
    case "armarios":
      $ruta="images/armarios/";
        break;
    case "cocinas":
      $ruta="images/cocinas/";
        break;
    case "cocinas1":
      $ruta="images/cocinas1/";
        break;
    case "estanterias":
      $ruta="images/estanterias/";
        break;           
    case "heladeria":
      $ruta="images/heladeria/";
        break; 
    case "mamedida":
      $ruta="images/mamedida/";
        break; 
    case "mba":
      $ruta="images/mba/";
        break; 
    case "escaleras":
      $ruta="images/escaleras/";
        break; 
    case "puertas":
      $ruta="images/puertas/";
        break; 
    case "rampas":
      $ruta="images/rampas/";
        break;              
    case "varias":
      $ruta="images/varias/";
        break;  
    case "varias":
      $ruta="images/varias/";
        break;  
    case "vestidores":
      $ruta="images/vestidores/";
        break;  

}*/
      //$ruta="images/galeriaarmarios/images/";
      $images = glob($ruta . "*.jpg");

      $nimages=count($images);
      $i=0;
      foreach($images as $image){
          $i++;
    ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $i-1; ?>" class="<?php if ($i==1) echo "active"; ?>"></li>
    <?php } ?>
    </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
   <?php 
      $i=0;
      foreach($images as $image){
          $i++;
        if ($i == 1){
            
      ?>
    <div class="item active">
     <?php } else { ?>
    <div class="item">
     <?php } ?>
      <img src="<?php echo $image;?>" alt="Los Angeles">
    </div>
    <?php }?>
    </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>