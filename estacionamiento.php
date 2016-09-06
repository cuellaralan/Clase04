<?php 


class estacionamiento 
{
	
	public static function Guardar($patente)
	{
		$archivo=fopen("archivos/estacionados.txt", "a");//escribe y mantiene la informacion existente		
		$ahora=date("Y-m-d H:i:s"); 
		$renglon=$patente."=>".$ahora."\n";
		fwrite($archivo, $renglon); 		 
		fclose($archivo);
	}
}
 ?>