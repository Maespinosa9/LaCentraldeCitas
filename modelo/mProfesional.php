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
		$this->cons($sql);
	}	

}

?>