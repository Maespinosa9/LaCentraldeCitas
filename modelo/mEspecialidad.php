<?php
include ("controlador/conexion.php");

class mEspecialidad{
	var $arr;

	function mEspecialidad(){}

	function insEsp($Nombre){
		$sql = "INSERT INTO especialidad(Nombre) VALUES ('".$Nombre."')";
		$this -> cons($sql);
	}

	function updEsp($IdEspecialidad, $Nombre){
		$sql = "UPDATE especialidad SET Nombre= '".$Nombre."'] WHERE IdEspecialidad = ".$IdEspecialidad;
		$this -> cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function SelEsp($filtro,$rvalini,$rvalfin){
		$sql = "Select * from Especialidad";
		if($filtro)
			$sql.= " WHERE Nombre LIKE '%".$filtro."%'";
		$sql.= " ORDER BY IdEspecialidad LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}

?>