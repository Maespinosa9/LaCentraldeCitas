<?php
include ("controlador/conexion.php");

class mSuscripcion{
	var $arr;

	function mSuscripcion(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insSus($IdVendedor, $Fecha, $IdUsuarioCreacion, $IdProfesional){
		$sql = "INSERT INTO suscripcion(IdVendedor, Fecha, IdUsuarioCreacion, IdProfesional) VALUES (".$IdVendedor.", ".$Fecha.", ".$IdUsuarioCreacion.", ".$IdProfesional.")";
		$this -> cons($sql);
	}

	function UpdSus($IdSuscripcion, $IdVendedor, $Fecha, $IdUsuarioCreacion, $IdProfesional){
		$sql = "UPDATE suscripcion SET IdVendedor=".$IdVendedor.",Fecha=".$Fecha.",IdUsuarioCreacion=".$IdUsuarioCreacion.",IdProfesional=";
		$Sql .= $IdProfesional." WHERE IdSuscripcion =".$IdSuscripcion;
		$this -> cons($sql);
	}

	function SelUsu(){
		$sql = "SELECT u.*, t.nombre as TipoUsuario from Usuario as u inner join TipoUsuario as t on u.IdTipoUsuario = t.IdTipoUsuario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function SelProf(){
		$sql = "SELECT * From Profesional";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

		function SelSus($filtro,$rvalini,$rvalfin){
		$sql = "SELECT s.*, u.Nombre, p.PrimerNombre, p.segundoNombre, p.PrimerApellido, p.SegundoApellido";
		$sql .= " from suscripcion as s inner join Usuario as u on u.IdUsuario = s.IdVendedor ";
		$sql .= "inner join Profesional as P on p.IdProfesional = s.IdProfesional";
		if($filtro)
			$sql.= " WHERE p.PrimerNombre LIKE '%".$filtro."%' OR p.segundoNombre LIKE '%".$filtro."%' OR p.PrimerApellido LIKE '%".$filtro."%' OR p.SegundoApellido LIKE '%".$filtro."%'";
		$sql.= " ORDER BY suscripcion.IdSuscripcion LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}

