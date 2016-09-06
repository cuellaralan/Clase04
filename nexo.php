<?php 
include_once "estacionamiento.php";
$patente = $_POST['patente'];
$accion = $_POST['accion'];

echo $patente;
echo "<br>";
echo $accion;

if ($accion == "estacionar") 
{
	estacionamiento::Guardar($patente);
}

header("location:index.php");

 ?>