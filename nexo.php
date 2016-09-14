<?php 
include_once "estacionamiento.php";

$patente = $_POST['patente'];
$accion = $_POST['accion'];

/*echo $patente;
echo "<br>";
echo $accion;*/

switch ($accion) 
{
	case 'estacionar':
		estacionamiento::Guardar($patente);
		header("location:index.php");
		break;
	case 'salir':
		estacionamiento::Sacar($patente);
		header("location:index.php");
		break;
	default:
		break;
}


//header("location:index.php");

 ?>