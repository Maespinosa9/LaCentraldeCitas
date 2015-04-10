<?php
include ("controlador/conexion.php");


class mProfesional{
	var $arr;

	function mProfesional(){}

	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insProf($IdUsuario, $IdTipoIdentificacion, $Identificacion, $PriApe, $SegApe, $PriNom, $SegNom, $RegistroProf, $Direccion, $Tel, $Cel, $mail, $observ, $Conmutador)
	{
		$sql = "INSERT INTO profesional (IdUsuario, IdTipoIdentificacion, Identificacion, PrimerApellido, SegundoApellido, PrimerNombre, SegundoNombre, RegistroProfesional, ";
		$sql .= "Direccion, Telefono, Celular, E_mail, Observaciones, Conmutador) VALUES '".$IdUsuario."', '".$IdTipoIdentificacion."', '".$Identificacion."', '".$PriApe."', ";
		$sql .= "'".$SegApe."', '".$PriNom."', '".$SegNom."', '".$RegistroProf."', '".$Direccion."', '".$Tel."', '".$Cel."', '".$mail."', '".$observ."', '".$Conmutador."'";
		echo $sql;
		$this->cons($sql);
	}

	function UpdProf($IdProfesional, $IdUsuario, $IdTipoIdentificacion, $Identificacion, $PriApe, $SegApe, $PriNom, $SegNom, $RegistroProf, $Direccion, $Tel, $Cel, $mail, $observ, $Conmutador)
	{
		$sql = "UPDATE profesional SET IdUsuario='".$IdUsuario."',IdTipoIdentificacion='".$IdTipoIdentificacion."' ";
		$sql .= ",Identificacion='".$Identificacion."',PrimerApellido='".$PriApe."',SegundoApellido='".$SegApe."' ";
		$sql .= ",PrimerNombre='".$PriNom."',SegundoNombre='".$SegNom."',RegistroProfesional='".$RegistroProf."' ";
		$sql .= ",Direccion='".$Direccion."',Telefono='".$Tel."',Celular='".$Cel."',E_mail='".$mail."' ";
		$sql .= ",Observaciones='".$observ."',Conmutador='".$Conmutador."' WHERE IdProfesional = '".$IdProfesional."'";
		$this->cons($sql);
	}

	function SelProf($filtro,$rvalini,$rvalfin)
	{
		$sql = "SELECT * from Profesional";
		if($filtro)
			$sql.= " WHERE Profesional.PrimerNombre LIKE '%".$filtro."%'";
		$sql.= " ORDER BY Profesional.IdProfesional LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function SelUsu(){
		$sql = "SELECT * from Usuario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function SelTipoId(){
		$sql = " SELECT * FROM TipoIdentificacion";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}

?>