<?php
include ("controlador/conexion.php");

class mTipoIdentificacion{
	var $arr;

	function mTipoIdentificacion(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insTipoUsu($Nombre){
		$sql = "INSERT INTO TipoIdentificacion (Nombre) values ('".$Nombre."')";
		$this->cons($sql);
	}

	function ActuTipoUsu($IdTipoUsuario, $Nombre){
		$sql = "UPDATE TipoIdentificacion SET Nombre = '" .$Nombre. "' WHERE IdTipoIdentificacion = '".$IdTipoUsuario."'";
		$this->cons($sql);
	}


	function SelTipoUsu($filtro,$rvalini,$rvalfin){
		$sql = "SELECT * from TipoIdentificacion";
		if($filtro)
			$sql.= " WHERE TipoIdentificacion.nombre LIKE '%".$filtro."%'";
		$sql.= " ORDER BY TipoIdentificacion.IdTipoIdentificacion LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}

?>