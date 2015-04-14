<?php
include ("controlador/conexion.php");

class mAdministradora{
	var $arr;

	function mAdministradora(){}

	function insTipoAd($Nombre){
		$sql = "INSERT INTO tipoadministradora (Nombre) VALUES ('".$Nombre."')";
		$this -> cons($sql);
	}

	function UpdTipoAd($IdTipoAdministradora, $Nombre){
		$sql = "UPDATE tipoadministradora SET Nombre = '".$Nombre."' WHERE IdTipoAdministradora = ".$IdTipoAdministradora; 
		$this -> cons($sql);
	}

	function insAdmin($IdTipoAdministradora, $Nombre){
		$sql = "INSERT INTO administradora (IdTipoAdministradora, Nombre) VALUES (".$IdTipoAdministradora.", '".$Nombre."')";
		$this -> cons($sql);
	}

	function UpdAdmin($IdAdministradora, $IdTipoAdministradora, $Nombre){
		$sql = "UPDATE administradora SET IdTipoAdministradora = ".$IdTipoAdministradora.", Nombre = '".$Nombre."' WHERE IdAdministradora = ".$IdAdministradora;
		$this -> cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function SelTipoAd(){
		$sql = "Select * From tipoadministradora";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function SelAdm($filtro,$rvalini,$rvalfin){
		$sql = "Select A.*, t.Nombre as TipoAdministradora From administradora as A inner join tipoadministradora as t on t.idtipoadministradora = a.idtipoadministradora";
		if($filtro)
			$sql.= " WHERE A.Nombre LIKE '%".$filtro."%'";
		$sql.= " ORDER BY a.IdAdministradora LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}