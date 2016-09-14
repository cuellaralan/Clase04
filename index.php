<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="animacion.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  	<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  	<script type="text/javascript" src="js/funcionAutoCompletar.js"></script>

	<?php

require_once"estacionamiento.php";
$path = "nexo.php";

estacionamiento::CrearJSAutocompletar();
estacionamiento::CrearTablaFacturado();
estacionamiento::CrearTablaEstacionados();

?>
<!doctype html>
</head>
<body >

<div class="CajaUno animated rotateInUpRight">

	<form id="FormIngreso" action="nexo.php" method="post" >
		<input type="text" name="patente" id="autocomplete" placeholder="ingrese patente" class="MiBotonUTN">
		<br><br>
		<input type="submit" value="estacionar" name="accion" id="accion" class="MiBotonUTNMenuInicio">
		<input type="submit" value="salir" name="accion" id="accion" class="MiBotonUTNMenuInicio">
	</form>


</div>


<div class="CajaEnunciadoIzquierda animated bounceInLeft">
      <h2>autos:</h2>
     

     <?php 

      include("archivos/tablaEstacionados.php");

     ?>
      
      
    </div>

     <div class="CajaEnunciadoDerecha animated bounceInLeft">
      <h2>Facturado:</h2>
     

     <?php 

      include("archivos/tablaFacturacion.php");

     ?>
      
      
    </div>

</body>
</html>