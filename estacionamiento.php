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

	
	public static function Leer()
	{
		$ListaDeAutosLeida=   array();
		$archivo=fopen("archivos/estacionados.txt", "r");//escribe y mantiene la informacion existente

			
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$auto=explode("=>", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$auto[0]=trim($auto[0]);
			if($auto[0]!="")
				$ListaDeAutosLeida[]=$auto;
		}

		fclose($archivo);//primero se cierra y despues se retorna
		return $ListaDeAutosLeida;
		

	}
	public static function Sacar($patente)
	{
	    $ListaDeAutosLeida = estacionamiento::Leer();
		//$archivo=fopen("archivos/estacionados.txt", "r");//escribe y mantiene la informacion existente

	    foreach ($ListaDeAutosLeida as $auto ) 
	    {
	    	if ($auto[0] == $patente) 
	    	{
	    		$inicio = $auto[1];
	    		$salida = date("Y-m-d H:i:s");

	    		$diferencia = strtotime($salida) - strtotime($inicio);
	    		$importe = $diferencia * 10;
	    		//se guarda en ticket.txt

	    		echo $importe;

	    	}
	    }
		/*	
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			
			$auto=explode("=>", $renglon);
			
			$auto[0]=trim($auto[0]);
			if($auto[0] != $patente && $auto != "")
				$ListaDeAutosLeida[]=$auto;
		}

		fclose($archivo);

		$archivo=fopen("archivos/estacionados.txt", "w");//escribe y mantiene la informacion existente	
			 
		foreach ($ListaDeAutosLeida as $auto) 
		{
			$fecha = $auto[1];
			$renglon=$auto[0]."=>".$fecha;
			fwrite($archivo, $renglon); 
		}
				 
		fclose($archivo);*/
		 
			
	}

	public static function CrearTablaEstacionados()
	{
	
	}

	public static function GuardarListado($listado)
	{
		

	}

	

	public static function CrearJSAutocompletar()
	{		
			$cadena="";

			$archivo=fopen("archivos/estacionados.txt", "r");

		    while(!feof($archivo))
		    {
			      $archAux=fgets($archivo);
			      //http://www.w3schools.com/php/func_filesystem_fgets.asp
			      $auto=explode("=>", $archAux);
			      //http://www.w3schools.com/php/func_string_explode.asp
			      $auto[0]=trim($auto[0]);

			      if($auto[0]!="")
			      {
			      	 $auto[1]=trim($auto[1]);
			      $cadena=$cadena." {value: \"".$auto[0]."\" , data: \" ".$auto[1]." \" }, \n"; 
		 


			      }
			}
		    fclose($archivo);

			 $archivoJS="$(function(){
			  var patentes = [ \n\r
			  ". $cadena."
			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});";
			
			$archivo=fopen("js/funcionAutoCompletar.js", "w");
			fwrite($archivo, $archivoJS);
	}

		public static function CrearTablaFacturado()
	{
			if(file_exists("archivos/facturacion.txt"))
			{
				$cadena=" <table border=1><th> patente </th><th> Importe </th>";

				$archivo=fopen("archivos/facturacion.txt", "r");

			    while(!feof($archivo))
			    {
				      $archAux=fgets($archivo);
				      //http://www.w3schools.com/php/func_filesystem_fgets.asp
				      $auto=explode("=>", $archAux);
				      //http://www.w3schools.com/php/func_string_explode.asp
				      $auto[0]=trim($auto[0]);
				      if($auto[0]!="")
				       $cadena =$cadena."<tr> <td> ".$auto[0]."</td> <td>  ".$auto[1] ."</td> </tr>" ; 
				}

		   		$cadena =$cadena." </table>";
		    	fclose($archivo);

				$archivo=fopen("archivos/tablaFacturacion.php", "w");
				fwrite($archivo, $cadena);




			}	else
			{
				$cadena= "no hay facturación";

				$archivo=fopen("archivos/tablaFacturacion.php", "w");
				fwrite($archivo, $cadena);
			}

	}
}
 ?>