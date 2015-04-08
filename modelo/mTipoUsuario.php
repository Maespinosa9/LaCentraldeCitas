<?php
include ("controlador/conexion.php");

class mTipoUsuario{
	var $arr;

	function mTipoUsuario(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insTipoUsu($Nombre){
		$sql = "INSERT INTO TipoUsuario (Nombre) values ('".$Nombre."')";
		$this->cons($sql);
	}

	function ActuTipoUsu($IdTipoUsuario, $Nombre){
		$sql = "UPDATE tipousuario SET Nombre = '" .$Nombre. "' WHERE IdTipoUsuario = '".$IdTipoUsuario."'";
		$this->cons($sql);
	}


	function SelTipoUsu($filtro,$rvalini,$rvalfin){
		$sql = "SELECT * from TipoUsuario";
		if($filtro)
			$sql.= " WHERE TipoUsuario.nombre LIKE '%".$filtro."%'";
		$sql.= " ORDER BY TipoUsuario.idTipoUsuario LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}

?>