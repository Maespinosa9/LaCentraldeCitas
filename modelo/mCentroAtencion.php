<?php
include ("controlador/conexion.php");

class mCentroAtencion{
	var $arr;

	function mCentroAtencion(){}

	function insCentro($IdCiudad, $Direccion, $Telefono, $Barrio, $Localidad, $Nombre, $Observaciones){
		$sql = "INSERT INTO centroatencion(IdCiudad, Direccion, Telefono, Barrio, Localidad, Nombre, Observaciones) VALUES (".$IdCiudad.", '".$Direccion."', '".$Telefono."', '".$Barrio."', '".$Localidad."', '".$Nombre."', '".$Observaciones."')";
		$this -> cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	


}
?>